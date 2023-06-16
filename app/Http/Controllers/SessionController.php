<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    //
    public function destroy() {
        auth()->logout();

        return redirect('/')->with('success', 'you have logged out');
    }

    public function create() {
        return view('sessions.create');
    }

    public function login() {
        $attributes = request()->validate([
            'email' => ['required', 'email', 'max:255', 'exists:users,email'],
            'password' => ['required', 'min:7', 'max:255' ]
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate();
            return redirect('/')->with('success', 'you have logged in');
        }
        throw ValidationException::withMessages(['email' => 'cant verify email']);
//        return back()
//            ->withInput()
//            ->withErrors(['email' => 'cant verify email']);
    }
}
