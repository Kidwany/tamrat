<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * Login api
     *
     * @param Request $request
     * @return Response
     *
     * Method: POST
     ***********************************************************
     * Inputs
     ***********************************************************
     * 'email' => 'string'
     * 'password' => 'string'
     * 'mobile_token' => 'string'
     ***********************************************************
     * Headers:
     ***********************************************************
     * Content-Type  => application/json
     * Accept  => application/json
     ***********************************************************
     * Response Codes:
     ***********************************************************
     * 405 => Email is Empty
     * 406 => Password is Empty
     * 407 => Mobile Token is Empty
     * 401 => Login Faild
     * 200 => Logged In Successfully
     */
    public function __invoke(Request $request)
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
            return response()->json(["status" => 406, 'error' => 'Password Must Be at Least 8 Numbers'], 406);
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


            // If Token existed but user_id not assigned
            $existedToken = $mobileToken = UserToken::where('token', $request->mobile_token)->first();
            // if row existed with user id and token
            $userToken = UserToken::where('user_id', $user->id)->first();

            if ($existedToken)
            {
                $existedToken->user_id = $user->id;
                $mobileToken->save();
            }


            elseif ($userToken)
            {
                $userToken->token = $request->mobile_token;
                $userToken->save();
            }

            else
            {
                $mobileToken = new UserToken();
                $mobileToken->user_id = $user->id;
                $mobileToken->token = $request->mobile_token;
                $mobileToken->save();
            }
            //$mobileToken->update(['token', $request->mobile_token]);

            return response()->json(['token' => $token, 'userInfo' => $userInfo], 200);
        }
        else
        {
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

}
