<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            return redirect('home');
        }

        return redirect()->back()->withErrors(['account' => 'The provided credentials do not match our records.']);
    }

    public function logout()
    {
        Auth::guard('account')->logout();

        return redirect('login');
    }

    public function registerShow()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'account' => 'required|unique:accounts|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email|unique:accounts|max:255',
            'password' => 'required|min:4',
        ]);

        if ($validatedData->fails()) {
            return redirect()->back()
                             ->withErrors($validatedData)
                             ->withInput();
        }

        $account = new Account();
        $account->account = $request->account;
        $account->name = $request->name;
        $account->email = $request->email;
        $account->password = Hash::make($request->password);
        $account->save();

        return redirect('login');
    }
}
