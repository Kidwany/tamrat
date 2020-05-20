<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangeLanguageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $input = $request->all();

        if (empty($input['lang']))
        {
            return response()->json(['status' => 402, 'error' => 'Lang Is Required'], 402);
        }

        $user = User::where('id', Auth::user()->id)->first();
        $user->lang = $input['lang'];
        $user->save();

        return response()->json(['status' => 200, 'message' => 'Language Has Been Updated Successfully To ' . $input['lang']], 200);
    }
}
