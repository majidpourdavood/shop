<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('site.panel.dashboard');
    }

    public function notifications()
    {
        $notifications = auth()->user()->notifications()->paginate(7);
        auth()->user()->unreadNotifications->markAsRead();
        return view('site.panel.notification', compact(['notifications']));
    }
}
