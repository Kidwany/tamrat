<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{


    /**
     * Method: POST
     * ******************************************
     * Response Codes
     * ******************************************
     * 402 => Name is Empty
     * 403 => Email is Empty
     * 405 => Phone is Empty
     * 406 => Message is Required
     * 200 => success
     *
    */
    public function send(Request $request)
    {

        if (empty($request->name))
        {
            return response()->json(['status' => 402, 'message' => 'Name is Required'], 402);
        }
        elseif (empty($request->email))
        {
            return response()->json(['status' => 403, 'message' => 'Email is Required'], 403);
        }
        elseif (empty($request->phone))
        {
            return response()->json(['status' => 405, 'message' => 'Phone is Required'], 405);
        }
        elseif (empty($request->message))
        {
            return response()->json(['status' => 406, 'message' => 'Message is Required'], 406);
        }

        $message = new Message();
        $message->name = $request->name;
        $message->phone = $request->phone;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->save();

        return response()->json(['status' => 200, 'message' => 'Message has been sent successfully'], 200);


    }
}
