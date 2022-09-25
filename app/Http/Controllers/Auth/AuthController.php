<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Auth\AuthenticationRequest;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authentication(AuthenticationRequest $request)
    {
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password], true)) {
            return redirect()->route('public.game.index');
        } else {
            return redirect()->back()->withErrors(['auth' => __('Password or email is wrong.')]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('public.game.index');
    }
}
