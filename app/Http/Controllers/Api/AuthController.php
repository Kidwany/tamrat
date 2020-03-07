<?php

namespace App\Http\Controllers\Api;

use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AuthController extends Controller
{


    public $successStatus = 200;

    /**
     * login api
     *
     * @param Request $request
     * @return Response
     */
    public function login(Request $request)
    {
        $input = $request->all();
        // Check Existence of Name
        if (empty($input['email']))
        {
            return response()->json(['error' => 'Email Must Be at Least 2 Chars'], 405);
        }
        // Check Phone
        elseif (empty($input['password']) || strlen($input['password']) < 8)
        {
            return response()->json(['error' => 'Password Must Be at Least 8 Numbers'], 406);
        }
        // Check Mobile Token
        elseif (empty($input['mobile_token']))
        {
            return response()->json(['error' => 'Mobile Token Can\'t Be Empty'], 407);
        }


        if(Auth::attempt(['email' => request('email'), 'password' => request('password'), 'user_type_id' => 1])){
            $user = Auth::user();
            $user->mobile_token = $request->mobile_token;
            $user->save();
            $token =  $user->createToken('MyApp')->accessToken;

            $userInfo = [
                'id' => $user->id,
                'name' => $user->name,
                'code' => $user->code,
                'email' => $user->email,
                'mobile_token' => $user->mobile_token,
                'image_url' => $user->image_url,
                'phone' => $user->phone,
                'lang'  => $user->lang
            ];

            return response()->json(['token' => $token, 'userInfo' => $userInfo], $this->successStatus);

        }
        else
        {
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    /**
     * Register api
     *
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {

        $input = $request->all();

        $input['image_url'];
        // Validate Email is Unique
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
        ]);

        // if email has been taken
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 402);
        }
        // Check Existence of Name
        elseif (empty($input['name']) || strlen($input['name']) < 2)
        {
            return response()->json(['error' => 'User Name Must Be at Least 2 Chars'], 405);
        }
        // Check Phone
        elseif (empty($input['phone']) || strlen($input['phone']) < 8)
        {
            return response()->json(['error' => 'Phone Must Be at Least 10 Numbers'], 406);
        }
        // Check Password
        elseif (empty($input['password']) || strlen($input['password']) < 8)
        {
            return response()->json(['error' => 'Password Must Be at Least 8 Letters'], 407);
        }
        // Check Platform
        elseif (empty($input['platform']))
        {
            return response()->json(['error' => 'Platform is Required'], 408);
        }
        // Check Mobile Token
        elseif (empty($input['mobile_token']))
        {
            return response()->json(['error' => 'Mobile Token Is Required'], 409);
        }
        // Check lang
        elseif (empty($input['lang']))
        {
            return response()->json(['error' => 'Lang Is Required'], 410);
        }

        $user = new User();
        $user->password = bcrypt($input['password']);
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->phone = $input['phone'];
        $user->mobile_token = $input['mobile_token'];
        $user->lang = $input['lang'];
        $user->platform = $input['platform'];

        if(isset($input['image_url']))
        {
            $user->image_url = $input['image_url'];
        }
        $user->user_type_id = 1;
        $user->status_id = 1;
        $user->code = '#U' . substr($input['name'], 0, 2) . substr($input['email'], 0, 2);
        $user->save();

        $token =  $user->createToken('MyApp')->accessToken;
        $registered_user = User::find($user->id);
        $userInfo = [
            'id' => $registered_user->id,
            'name' => $registered_user->name,
            'code' => $registered_user->code,
            'email' => $registered_user->email,
            'mobile_token' => $registered_user->mobile_token,
            'image_url' => $registered_user->image_url,
            'phone' => $registered_user->phone,
            'lang'  => $registered_user->lang
        ];
        return response()->json(['token'=>$token, 'userInfo' => $userInfo], $this->successStatus);
    }


    /**
     * Update User Info
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUserInfo(Request $request)
    {
        $input = $request->all();

        $user = Auth::user();

        // Validate Email is Unique
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,id,'. Auth::user()->id . '|max:100',
            //'password' => 'required|confirmed|min:6',
        ]);

        // if email has been taken
        if ($validator->fails()) {
            return response()->json(['error' => 'Email Has Been Taken'], 402);
        }
        // Check Existence of Name
        elseif (empty($input['name']) || strlen($input['name']) < 2)
        {
            return response()->json(['error' => 'User Name Must Be at Least 2 Chars'], 405);
        }
        // Check Phone
        elseif (empty($input['phone']) || strlen($input['phone']) < 8)
        {
            return response()->json(['error' => 'Phone Must Be at Least 8 Numbers'], 406);
        }


        try
        {
            // Save User and User Details
            if (isset($input['password']))
            {
                $user->password = bcrypt($input['password']);
            }
            $user->name = $input['name'];
            $user->email = $input['email'];
            $user->phone = $input['phone'];
            if(isset($input['image_url']))
            {
                $user->image_url = $input['image_url'];
            }

            $user->save();

            $user->userDetails()->update(['fname' => $input['name'], 'medical_history' => $input['medical_history']]);

        }
        catch (\Exception $e)
        {
            return response()->json(['error' => 'Error On Saving Data'], 500);
        }

        $userDetails = UserDetails::where('user_id', $user->id)->first();
        $userInfo = [
            'id' => $user->id,
            'name' => $user->name,
            'code' => $user->code,
            'email' => $user->email,
            'mobile_token' => $user->mobile_token,
            'user_type_id' => $user->user_type_id,
            'image_url' => $user->image_url,
            'phone' => $user->phone,
            'medical_history' => $userDetails->medical_history,
            'lang'  => $userDetails->lang
        ];

        return response()->json(['status'=>200, 'userInfo' => $userInfo], $this->successStatus);
    }


    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->mobile_token = null;
        $user->save();

        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Logged out'
        ]);
    }


    public function sendResetPasswordEmail(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 422);
        }

        $user = User::where('email', \request('email'))->first();
        if(!empty($user))
        {
            $token = app('auth.password.broker')->createToken($user);
            $data = DB::table('password_resets')->insert([
                'email'  => $user->email,
                'token'  => $token,
                'created_at' => Carbon::now()
            ]);
            Mail::to($user->email)->send(new ResetPasswordEmail(['data' => $user, 'token' => $token]));
            return response()->json(['message' => 'Reset Password Link Sent Successfully to your mail'], 200);
        }else
        {
            return response()->json(['message' => 'Email Not Found'], 404);
        }
    }

    /**
     * @param $token
     * @return Factory|View|string
     * @method GET
     * @Function_Description Return Reset Password View And The Token Will Be Expired Within 2 Hours
     */
    public function resetPasswordView($token)
    {
        $check_token = DB::table('password_resets')
            ->where('token', $token)
            ->where('created_at', '>', Carbon::now()->subHours(2))->first();

        if (!empty($check_token))
        {
            return view('auth.passwords.reset', compact('check_token'));
        }
        elseif( $check_token = DB::table('password_resets')
            ->where('token', $token)
            ->where('created_at', '<', Carbon::now()->subHours(2))->first())
        {
            return 'Expired Token';
        }

        elseif(empty($check_token))
        {
            return 'Token Not Found';
        }
        else
        {
            return 'Not Found';
        }
    }

    /**
     * @method POST
     * @Function_Description This Function Saves New Password
    */
    public function resetPassword()
    {
        //$input = $request->all();

        $validator = Validator::make(\request()->all(), [
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6'
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 422);
        }

        $token = \request('token');
        $check_token = DB::table('password_resets')
            ->where('token', $token)
            ->where('created_at', '>', Carbon::now()->subHours(2))->first();
        if (!empty($check_token))
        {
            $user = User::where('email', $check_token->email)->update([
                'email' => $check_token->email,
                'password' => bcrypt(\request('password'))
            ]);
            return redirect()->back()->with('update', 'Your Password Updated Successfully');
        }
        else
        {
            return 'error';
        }
    }


    public function changeLang(Request $request)
    {
        $input = $request->all();

        if (empty($input['lang']))
        {
            return response()->json(['status' => 402, 'error' => 'Lang Is Required'], 402);
        }

        $user = UserDetails::where('user_id', Auth::user()->id)->first() ;
        $user->lang = $input['lang'];
        $user->save();

        return \response()->json(['status' => 200, 'message' => 'Language Has Been Updated Successfully To ' . $input['lang']], 200);
    }
}
