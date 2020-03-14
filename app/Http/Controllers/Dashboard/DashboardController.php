<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.welcome');
    }

    public function logout()
    {
        auth()->logout();
        // redirect to homepage
        return redirect('/login');
    }
}
