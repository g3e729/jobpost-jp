<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Services\UserService;
use App\Http\Requests\ForgotPasswordRequest;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function create()
    {
        return view('auth.passwords.request');
    }

    public function store(ForgotPasswordRequest $request)
    {
        $password_reset = PasswordReset::create($request->only('email'));

        return back()->withSuccess("Success! Token link was sent to {$password_reset->email}");
    }

    public function edit($token)
    {
        $password_reset = PasswordReset::findToken($token);

        return view('auth.passwords.edit', compact('password_reset'));
    }

    public function update(ForgotPasswordRequest $request)
    {
        $user = (new UserService)->findEmail($request->only('email'));

        if (!$user) {
            abort(404);
        }

        $user->update($request->only('password'));
        $password_reset = PasswordReset::findToken($request->get('token'))->delete();

        return redirect()->route('login')->with('message', 'Password successfully updated!');
    }
}
