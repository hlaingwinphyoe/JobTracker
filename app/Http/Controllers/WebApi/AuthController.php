<?php

namespace App\Http\Controllers\WebApi;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $employer = Type::isType('user')->where('name', 'employer')->first();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'company_name' => $request->company_name,
            'company_type' => $request->company_type,
            'region_id' => $request->region,
            'type_id' => $employer->id,
        ])->assignRole('Employer');

        Auth::login($user);

        return response()->json([
            'message' => 'Successful Login',
            'user' => $user
        ]);
    }
}
