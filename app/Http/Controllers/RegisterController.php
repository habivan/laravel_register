<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function create()
    {

        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
