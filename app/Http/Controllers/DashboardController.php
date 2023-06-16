<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function dashboard(): View {
        return view('dashboard.index');
    }

    public function profile(): View {
        $user = Auth::user();
        return view('dashboard.profile', compact('user'));
    }

    public function updateProfile(Request $request) {
        if (!Hash::check($request->input('old_password'), Auth::user()->password)) {
            return redirect()->route('dashboard.profile')
            ->with('failed', 'Update failed! You input wrong old password!');
        }

        $credentials = $this->validate($request, [
            'name' => 'required|max:255|min:3',
            'email' => 'required|email',
            'password' => 'max:255|confirmed',
        ]);

        if (!is_null($credentials['password'])) {
            $credentials['password'] = Hash::make($credentials['password']);
        } else {
            unset($credentials['password']);
        }

        User::where('id', Auth::id())->update($credentials);

        return redirect()->route('dashboard.profile')->with('success', 'Profile updated!');
    }
}
