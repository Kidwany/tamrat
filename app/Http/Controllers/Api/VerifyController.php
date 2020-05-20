<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\VerifyUser;
use App\Models\Verification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * Class VerifyController
 * @package App\Http\Controllers
 */
class VerifyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     *
     ***********************************************************
     * Method: POST
     ***********************************************************
     * Inputs
     ***********************************************************
     * 'user_id' => integer
     * 'code' => string
     ***********************************************************
     * Headers:
     ***********************************************************
     * Content-Type  => application/json
     * Accept  => application/json
     ***********************************************************
     * Response Codes:
     ***********************************************************
     * 402 => UserID Is Required
     * 403 => Code is Wrong
     * 404 => User Not Found
     * 405 => Code is Expired, Check New Code
     * 200 => Verified
     */
    public function __invoke(Request $request)
    {
        $user = User::find($request->user_id);
        if (empty($request->user_id))
        {
            return response()->json(['status' => 402, 'message' => 'UserID Is Required'], 402);
        }

        if (!$user)
        {
            return response()->json(['status' => 404, 'message' => 'User Not Found'], 404);
        }

        $userCode = Verification::where('user_id', $user->id)->first();

        if (!$userCode)
        {
            $verification = new Verification();
            $verification->code = rand(1000, 9999);
            $verification->user_id = $user->id;
            $verification->save();

            Mail::to($user->email)->send(new VerifyUser($user, $verification->code));

            return response()->json(['status' => 405, 'message' => 'Code Has Been Expired, Check New Code on Your Mail'], 405);
        }

        if ($request->code == $userCode->code)
        {
            $user->email_verified_at = time();
            $user->save();
            return response()->json(['status' => 200, 'message' => 'User Has Been Verified Successfully'], 200);
        }

        else
        {
            return response()->json(['status' => 403, 'message' => 'Code is Wrong'], 403);
        }
    }
}
