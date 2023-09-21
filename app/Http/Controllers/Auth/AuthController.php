<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function customRegister(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'regex:/[0-9]{11}/', 'digits:11'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $employee = Type::isType('user')->where('name', 'employee')->first();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'type_id' => $employee->id,
        ])->assignRole('Employee');

        Auth::login($user);

        return redirect()->route('home.index');
    }

    public function customLogin(Request $request)
    {
        $user = User::where('name', $request->credentials)
            ->orWhere('email', $request->credentials)
            ->orWhere('phone', $request->credentials)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'credentials' => 'These credentials do not match our records.',
            ]);
        }

        Auth::login($user);
        return redirect()->route('home.index')->with(['message', 'Login Successfull']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home.index');
    }
}
