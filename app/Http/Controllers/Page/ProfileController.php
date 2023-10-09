<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('pages.employees.profile.index', compact('user'));
    }

    public function savedJobs()
    {
        return view('pages.employees.profile.saved-jobs');
    }

    public function changeInfo(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|digits:11|unique:users,phone,' . $user->id
        ]);

        $user->update($request->only(['name', 'email', 'phone']));

        return redirect()->back()->with('message', 'Profile Updated.');
    }

    public function changePassword(Request $request)
    {
        $currentUser = User::findOrFail(Auth::id());
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'new_confirm_password' => 'required_with:new_password|same:new_password|min:8',
        ]);

        if (!$currentUser || !Hash::check($request->password, $currentUser->password)) {
            throw ValidationException::withMessages([
                'credentials' => 'These credentials do not match our records.',
            ]);
        } else {
            $currentUser->password = bcrypt($request->new_password);
            $currentUser->update();

            // login again
            Auth::logout();
            return redirect()->route('auth.login')->with('logout', "Successfully Changed.Please Login Again");
        }
    }
}
