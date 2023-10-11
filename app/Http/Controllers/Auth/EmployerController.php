<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EmployerController extends Controller
{
    public function login()
    {
        if (Auth::guard('employer')->check()) {
            return back();
        } else {
            return view('auth.employer-login');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::guard('employer')->logout();

        return redirect()->route('home.index');
    }
}
