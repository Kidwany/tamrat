<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\VerifyUser;
use App\Models\UserToken;
use App\Models\Verification;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Register api
     *
     * @param Request $request
     * @return Response
     *
     *
     ***********************************************************
     * Method: POST
     ***********************************************************
     * Inputs
     ***********************************************************
     * 'name' => 'string'
     * 'phone' => 'string'
     * 'email' => 'string'
     * 'password' => 'string'
     * 'platform' => 'integer'  // If Android Enter 1 If IOS Enter 2
     * 'lang' => 'string'  // ar or en
     * 'mobile_token' => 'string'
     ***********************************************************
     * Headers:
     ***********************************************************
     * Content-Type  => application/json
     * Accept  => application/json
     ***********************************************************
     * Response Codes:
     ***********************************************************
     * 402 => Email Has Been Taken
     * 405 => Name is Empty or Less Than Two Characters
     * 406 => Phone is Empty or Less than 8 numbers
     * 407 => Password is required or less than 8 chars
     * 408 => platform is required
     * 409 => mobile token is required
     * 410 => lang is required
     * 411 => email is required
     * 200 => registered Successfully
     *
     */
    public function __invoke(Request $request)
    {

        $input = $request->all();

        $input['image_url'];
        // Validate Email is Unique
        $validator = Validator::make($request->all(), [
            'email' => 'unique:users',
        ]);

        // if email has been taken
        if ($validator->fails()) {
            return response()->json(['status' => 402,'error'=> 'Email Has Been Taken'], 402);
        }
        // Check Existence of Name
        elseif (empty($input['name']) || strlen($input['name']) < 2)
        {
            return response()->json(['status' => 405,'error' => 'User Name Must Be at Least 2 Chars'], 405);
        }
        // Check Phone
        /*elseif (empty($input['phone']) || strlen($input['phone']) < 8)
        {
            return response()->json(['status' => 406,'error' => 'Phone Must Be at Least 10 Numbers'], 406);
        }*/
        // Check Password
        elseif (empty($input['password']) || strlen($input['password']) < 8)
        {
            return response()->json(['status' => 407,'error' => 'Password Must Be at Least 8 Letters'], 407);
        }
        // Check Email
        elseif (empty($input['email']))
        {
            return response()->json(['status' => 411,'error' => 'Email Is Required'], 411);
        }
        // Check Platform
        elseif (empty($input['platform']))
        {
            return response()->json(['status' => 408,'error' => 'Platform is Required'], 408);
        }
        // Check Mobile Token
        elseif (empty($input['mobile_token']))
        {
            return response()->json(['status' => 409,'error' => 'Mobile Token Is Required'], 409);
        }
        // Check lang
        elseif (empty($input['lang']))
        {
            return response()->json(['status' => 410,'error' => 'Lang Is Required'], 410);
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


        // Generate Verification Code
        $verification = new Verification();
        $verification->code = rand(1000, 9999);
        $verification->user_id = $user->id;
        $verification->save();


        // If Token existed but user_id not assigned
        $existedToken = $mobileToken = UserToken::where('token', $request->mobile_token)->first();

        if ($existedToken)
        {
            $existedToken->user_id = $registered_user->id;
            $mobileToken->save();
        }

        else
        {
            $mobileToken = new UserToken();
            $mobileToken->user_id = $user->id;
            $mobileToken->token = $request->mobile_token;
            $mobileToken->save();
        }

        Mail::to($user->email)->send(new VerifyUser($user, $verification->code));

        return response()->json(['token'=>$token, 'userInfo' => $userInfo], 200);
    }
}
