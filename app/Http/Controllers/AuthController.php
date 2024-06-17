<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function proseslogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->hasRole('admin')) {
                return redirect('/panel/dashboardadmin');
            } else {
                return redirect('/dashboard');
            }
        }


    }

    public function proseslogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function proseslogoutadmin()
    {
        Auth::logout();
        return redirect('/');
    }

    public function prosesloginadmin(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        if ($user) {
            // Log the user in
            Auth::login($user);

            // Now you can check the role
            if ($user->hasRole('admin')) {
                return redirect('/panel/dashboardadmin');
            } else {
                return redirect('/dashboard');
            }
        }

        // Authentication failed
        return redirect('/')->with(['warning' => 'Nik (Username) / Password Salah']);
    }

}
