<?php

namespace App\Http\Controllers\Api;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function myNotification()
    {
        $notifications = Notification::with('sentFrom')
            ->where('notifiable_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();
        if ($notifications->count() > 0)
        {
            return response()->json(['notifications' => $notifications], 200);
        }

        else
        {
            return response()->json(['notifications' => 'There is no notifications'], 200);
        }
    }
}
