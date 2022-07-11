<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function signIn(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'max:255'],
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->withErrors([
                'email' => [
                    'Credentials incorrect',
                ],
            ]);
        }
    }

    public function logout()
    {

    }
}
