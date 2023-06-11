<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function displayLoginPage(): View
    {
        return view('auth.login');
    }

    public function displayRegisterPage(): View
    {
        return view('auth.register');
    }

    function login(Request $request): RedirectResponse
    {
        $validatedData = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|max:255'
        ]);

        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return redirect()->back()->with('failed', 'Wrong email or password!');
    }

    function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    function register(Request $request): RedirectResponse
    {
        $credentials = $this->validate($request, [
            'name' => 'required|unique:users|max:255|min:3',
            'email' => 'required|unique:users|email',
            'password' => 'required|max:255|min:8|confirmed'
        ]);

        $credentials['password'] = Hash::make($credentials['password']); //pakai hash
        $credentials['role'] = User::role['participant'];
        User::create($credentials);

        return redirect()->route('login')->with('success', 'Registration successful!');
    }
}
