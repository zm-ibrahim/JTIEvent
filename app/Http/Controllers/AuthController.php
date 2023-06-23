<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function login(Request $request): RedirectResponse
    {
        $validatedData = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|max:255'
        ]);

        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();

            switch (Auth::user()->role) {
                case User::role['participant']:
                    $name = Auth::user()->participant->full_name;
                    break;
                case User::role['judge']:
                    $name = Auth::user()->judge->full_name;
                    break;
                case User::role['admin']:
                    $name = 'admin';
                    break;
            }
            $request->session()->put('name', $name);

            return redirect()->intended('dashboard');
        }

        return redirect()->back()->with('failed', 'Wrong email or password!');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register(Request $request): RedirectResponse
    {
        $participantData = $this->validate($request, [
            'full_name' => 'required|max:255|min:3',
            'phone_number' => 'required|numeric|digits_between:10,13',
            'birth_date' => 'required|date',
            'school_name' => 'required|max:255|min:3',
        ]);

        $credentials = $this->validate($request, [
            'photo' => 'image|file|max:5200',
            'email' => 'required|unique:users|email',
            'password' => 'required|max:255|min:8|confirmed',
        ]);
        $credentials['password'] = Hash::make($credentials['password']);
        $credentials['role'] = User::role['participant'];
        if (isset($credentials['photo'])) {
            $credentials['photo'] = $request->photo->store('photo-profile');
        }

        try {
            DB::beginTransaction();

            $user = User::create($credentials);
            $user->participant()->create($participantData);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollback();
            return $exception;
        }

        return redirect()->route('login')->with('success', 'Registration successful!');
    }
}
