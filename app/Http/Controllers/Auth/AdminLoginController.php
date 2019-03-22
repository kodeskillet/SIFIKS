<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        // Validate Data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // Attempt Login
        if(Auth::guard('admin')->attempt($credentials, $request->remember)) {
            // If 'true' -> redirect to admin.index
            session(['role' => 'Admin']);
            return redirect()->intended(route('admin.index'));
        }
        // If 'false' -> redirect back to admin.login
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
