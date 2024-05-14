<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginAuth(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $potentialUser = User::where('email', $request->input('email'))->first();

        if (!$potentialUser) {
            return redirect()->to('/login')->withErrors(['email' => 'Email not found']);
        }

        if (!password_verify($request->input('password'), $potentialUser['password'])) {
            return redirect()->to('/login')->withErrors(['password' => 'Incorrect password']);
        }

        auth()->login($potentialUser);
        request()->session()->regenerate();

        return view('welcome');
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->to('/login');
    }
}
