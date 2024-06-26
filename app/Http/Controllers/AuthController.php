<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required']
        ]);

        //  Attempt to login the user
        if (Auth::attempt($fields, $request->remember)) {
            return redirect()->intended('dashboard');
        } else {
            return back()->withErrors([
                'failed' => 'The provided credentials do not match our records.'
            ]);
        }
    }

    // public function loginAuth(Request $request)
    // {
    //     $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]);

    //     $potentialUser = User::where('email', $request->input('email'))->first();

    //     if (!$potentialUser) {
    //         return redirect()->to('/login')->withErrors(['email' => 'Email not found']);
    //     }

    //     if (!password_verify($request->input('password'), $potentialUser['password'])) {
    //         return redirect()->to('/login')->withErrors(['password' => 'Incorrect password']);
    //     }

    //     auth()->login($potentialUser);
    //     request()->session()->regenerate();

    //     return view('welcome');
    // }

    public function logout(Request $request) {
        // Logout the user
        Auth::logout();

        // Invalidate the user's session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        // Redirect to home
        return redirect('/');
    }
}
