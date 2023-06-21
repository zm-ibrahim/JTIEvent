<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function dashboard(): View
    {
        switch (Auth::user()->role) {
            case User::role['participant']:
                $name = Auth::user()->participant->full_name;
                break;
            case User::role['judge']:
                $name = Auth::user()->participant->full_name;
                break;
            case User::role['admin']:
                $name = 'admin';
                break;
        }
        return view('dashboard.index', compact('name'));
    }

    public function profile(): View
    {
        $user = Auth::user();
        $name = 'Admin';
        if ($user->role == User::role['participant']) {
            $name = $user->participant->full_name;
        } elseif ($user->role == User::role['judge']) {
            $name = $user->judge->full_name;
        }
        return view('dashboard.profile', compact('user', 'name'));
    }

    public function updateProfile(Request $request)
    {
        if (!Hash::check($request->input('old_password'), Auth::user()->password)) {
            return redirect()->route('dashboard.profile')
                ->with('failed', 'Update failed! You input wrong old password!');
        }

        // $validatedData = $this->validate($request, [
        //     'full_name' => 'required|max:255|min:3',
        //     'phone_number' => 'required|numeric|digits_between:10,13',
        // ]);
        // $profile = Auth::user()->judge;
        // if (Auth::user()->role == User::role['participant']) {
        //     $participantData = $this->validate($request, [
        //         'birth_date' => 'required|date',
        //         'school_name' => 'required|max:255|min:3',
        //     ]);

        //     $validatedData += $participantData;
        //     $profile = Auth::user()->participant;
        // }

        $credentials = $this->validate($request, [
            'photo' => 'image|file|max:5200',
            'email' => 'required|email',
            'password' => 'max:255|confirmed',
        ]);
        if (!is_null($credentials['password'])) {
            $credentials['password'] = Hash::make($credentials['password']);
        } else {
            unset($credentials['password']);
        }
        if (isset($credentials['photo'])) {
            $userPhoto = Auth::user()->photo;
            if ($userPhoto) {
                Storage::delete($userPhoto);
            }
            $credentials['photo'] = $request->photo->store('photo-profile');
        }

        try {
            DB::beginTransaction();

            User::where('id', Auth::id())->update($credentials);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollback();
            return $exception;
        }

        return redirect()->route('dashboard.profile')->with('success', 'Profile updated!');
    }
}
