<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderFinance;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all()->count();
        $ordersCount = Order::where('status_id', 7)->count();
        $users = User::all()->count();
        $sales = OrderFinance::with('order')->sum('total');
        $orders = Order::with('status')->where('status_id', 7)->orderBy('created_at', 'desc')->limit(10)->get();
        return view('dashboard.welcome', compact('products', 'ordersCount', 'users', 'sales', 'orders'));
    }

    public function logout()
    {
        auth()->logout();
        // redirect to homepage
        return redirect('/login');
    }
}
