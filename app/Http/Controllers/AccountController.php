<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
        $account->password = $request->password;
        $account->save();

        return redirect('login');
    }

    public function passwordForget()
    {
        return view('password.forget');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('password.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:4',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => $password,
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new \Illuminate\Auth\Events\PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
}
