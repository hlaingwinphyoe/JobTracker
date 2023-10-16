<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register()
    {
        if (Auth::guard('employee')->check()) {
            return back();
        } else {
            $regions = Region::all();
            return view('auth.register', compact('regions'));
        }
    }

    public function login()
    {
        if (Auth::guard('employee')->check()) {
            return back();
        } else {
            return view('auth.login');
        }
    }

    // public function employerLogin()
    // {
    //     if (Auth::check()) {
    //         return back();
    //     } else {
    //         return view('auth.employer-login');
    //     }
    // }

    public function customRegister(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'regex:/[0-9]{11}/', 'digits:11'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'region' => ['required', 'integer', 'exists:regions,id'],
        ]);

        $employee = Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'region_id' => $request->region,
        ]);

        Auth::guard('employee')->login($employee);
        return redirect()->route('profile.index')->with(['message', 'Login Successfull']);
        // return redirect()->route('employee.login');
    }

    public function customLogin(Request $request)
    {
        $employee = Employee::where('name', $request->credentials)
            ->orWhere('email', $request->credentials)
            ->orWhere('phone', $request->credentials)->first();

        if (!$employee || !Hash::check($request->password, $employee->password)) {
            throw ValidationException::withMessages([
                'credentials' => 'These credentials do not match our records.',
            ]);
        }

        Auth::guard('employee')->login($employee);
        return redirect()->route('profile.index')->with(['message', 'Login Successfull']);

        // $check = $request->all();

        // if (Auth::guard('employee')->attempt(['email' => $check['credentials'], 'password' => $check['password']])) {
        //     Session::regenerate();
        //     return redirect()->route('profile.index')->with(['message', 'Login Successfull']);
        // } else {
        //     return back()->with('message', 'login fail');
        // }
    }

    public function logout()
    {
        Auth::guard('employee')->logout();
        Session::flush();
        return redirect()->route('home.index')->with('message', 'Logout Successful');
    }
}
