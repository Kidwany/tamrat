<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsitePagesController extends Controller
{
    public function privacy()
    {
        return view('privacy');
    }
}
