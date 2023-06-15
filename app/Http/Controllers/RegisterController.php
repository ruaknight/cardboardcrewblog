<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function create() {
        return view('register.create');
    }

    public function store() {
        $attributes = request()->validate([
            'name' => ['required', 'max:255', 'unique:users,name', 'min:3'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:7', 'max:255' ]
        ]);

        $attributes['role'] = 'author';

        User::create($attributes);

        session()->flash('success', 'account created');

        return redirect('/');
    }
}
