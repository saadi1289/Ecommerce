<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            return redirect()->route('login')->with('error', 'You must be an admin to access this page.');
        }
        $notifications = Auth::user()->notifications()->where('read_at', false)->count();

        $user = Auth::user();
        return view('admin.dashboard' , compact('user', 'notifications'));
    }
}
