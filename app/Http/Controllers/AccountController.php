<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $account = $request->input('account');
        $password = $request->input('password');

        if (Auth::guard('account')->attempt(['account' => $account, 'password' => $password])) {
            return redirect()->intended('home');
        }

        return redirect()->back()->withErrors(['account' => 'The provided credentials do not match our records.']);
    }
}
