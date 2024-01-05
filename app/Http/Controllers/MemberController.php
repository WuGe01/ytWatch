<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function show()
    {
        return view('member.edit');
    }

    public function edit(Request $request)
    {
        $rules = [];

        if ($request->filled('name')) {
            $rules['name'] = 'string|max:255';
        }

        if ($request->filled('password')) {
            $rules['password'] = 'string|min:4|confirmed';
        }

        $request->validate($rules);

        $email = Auth::user()->email;

        $account = Account::where('email', $email)->first();

        if (!$account) {
            return redirect()->back()->with('error', '找不到帳戶！');
        }

        if ($request->filled('name')) {
            $account->name = $request->name;
        }

        if ($request->filled('password')) {
            $account->password = $request->password;
        }

        $account->save();

        return redirect()->back()->with('success', '帳戶更新成功！');
    }
}
