<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function showLogin()
    {
        return view('admin_login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'Email' => 'required|email',
            'Password' => 'required|string',
        ]);
    
        $admin = User::where('admin_email', $request->input('Email'))->first();
    
        if ($admin && Hash::check($request->input('Password'), $admin->admin_password)) {
            Auth::login($admin); // Lưu admin vào session
            return redirect()->route('admin.dashboard')->with('message', 'Đăng nhập thành công!');
        }
    
        return redirect()->back()->withErrors(['loginError' => 'Email hoặc mật khẩu không đúng.']);
    }

    public function dashboard()
    {
        $admins = User::all(); // Retrieve all admin records from the database
        return view('admin.dashboard', compact('admins'));
    }
    public function logout(Request $request)
{
    Auth::logout(); // Log out the user
    $request->session()->invalidate(); // Invalidate the session
    $request->session()->regenerateToken(); // Regenerate the CSRF token

    return redirect()->route('admin.login')->with('message', 'Đăng xuất thành công!');
}
}
