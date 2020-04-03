<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserToken;
use App\User;
use Illuminate\Http\Request;

class UpdateTokenController extends Controller
{
    public function updateToken(Request $request)
    {
        if (empty($request->token))
        {
            return response()->json(['status' => 402, 'message' => 'Mobile Token Is Required'], 402);
        }

        // Check if user id not empty
        if ($request->user_id != null)
        {
            $user = User::find($request->user_id);
            if (!$user)
            {
                return response()->json(['status' => 404, 'message' => 'User Not Found'], 404);
            }

            $token = UserToken::where('user_id', $user->id)->first();
            if ($token)
            {
                $token->token = $request->token;
                $token->save();
            }
            else
            {
                $token = new UserToken();
                $token->token = $request->token;
                $token->user_id = $request->user_id;
                $token->save();
            }

            return response()->json(['status' => 200, 'message' => 'Token Updated'], 200);

        }
        else
        {
            $mobileToken = UserToken::where('token', $request->token)->first();
            if ($mobileToken)
            {
                return response()->json(['status' => 200, 'message' => 'Token Updated'], 200);
            }
            else
            {
                $mobileToken = new UserToken();
                $mobileToken->token = $request->token;
                $mobileToken->save();
                return response()->json(['status' => 200, 'message' => 'Token Updated'], 200);
            }
        }

    }
}

