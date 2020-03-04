<?php


namespace App\Classes;


use App\Models\Setting;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Auth;

class UserSetting
{

    public static function userLanguage()
    {
        $userLang = UserDetails::where('user_id', Auth::user()->id)->first()->lang;
        if ($userLang)
        {
            return $userLang;
        }
        else
        {
            return Setting::first()->default_lang;
        }
    }

}
