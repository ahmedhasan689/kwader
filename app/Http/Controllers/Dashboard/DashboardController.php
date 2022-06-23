<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $notifications  = $user->notifications;
        return view('Dashboard.index', compact('notifications'));
    }

    public function master()
    {
        $user = Auth::user();
        $notifications  = $user->notifications;

        return view('layouts.main-header', compact('notifications'));
    }
}
