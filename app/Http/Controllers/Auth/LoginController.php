<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller 
{
    public function loginpage():View{
        return view('auth.login');
    }

    public function login(Request $request):RedirectResponse{
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/movie');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);

        redirect()->route('movie.index');
    }


}
