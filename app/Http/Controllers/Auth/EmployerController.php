<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EmployerController extends Controller
{
    public function login()
    {
        if (Auth::check() || Auth::guard('employee')->check()) {
            return view('composables.404');
        } else {
            return view('auth.employer-login');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('home.index');
    }
}
