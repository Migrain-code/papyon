<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => "required",
            'password' => "required",
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->with('response',[
            'status' => "error",
            'message' => 'E-posta veya Şifre Hatalı Lütfen Tekrar Deneyin',
        ]);
    }

    public function dashboard()
    {
        return view('admin.home.index');
    }
}
