<?php

namespace App\Http\Controllers\WebApi;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function employerRegister(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'regex:/[0-9]{11}/', 'digits:11'],
            'password' => ['required', 'string', 'min:8'],
            'company_name' => ['required', 'string'],
            'company_type' => ['required', 'string'],
            'region' => ['required', 'integer', 'exists:regions,id'],
        ]);

        $employerType = Type::isType('user')->where('slug', 'employer')->first();

        $employer = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'company_name' => $request->company_name,
            'company_type' => $request->company_type,
            'region_id' => $request->region,
            'type_id' => $employerType->id,
            'desc' => $request->desc,
        ])->assignRole('Employer');

        Auth::login($employer);

        return response()->json([
            'message' => 'Successful Login',
            'employer' => $employer
        ]);
    }

    public function employerLogin(Request $request)
    {
        $employer = User::where('name', $request->credentials)
            ->orWhere('email', $request->credentials)
            ->orWhere('phone', $request->credentials)->first();

        if (!$employer || !Hash::check($request->password, $employer->password)) {
            throw ValidationException::withMessages([
                'credentials' => 'These credentials do not match our records.',
            ]);
        }

        Auth::login($employer);

        return redirect()->route('home.index');
    }
}
