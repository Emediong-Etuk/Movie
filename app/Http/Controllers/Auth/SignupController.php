<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Models\User;
use App\Models\Verifytoken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;


class SignupController extends Controller
{
    //

    
    public function register():View
    {
        return view('auth.register');
    }

    public function signup(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $validatorToken= rand(10,100.. '2022');
        $getToken=new Verifytoken();
        $getToken->token=$validatorToken;
        $getToken->email=$request->email;
        $getToken->save();

        // Send email with verification link
        $getUserEmail=$request->email;
        $getUserName=$request->name;
        Mail::to($getUserEmail)->send(new WelcomeMail($getUserEmail,$validatorToken,$getUserName));
        

        return redirect()->route('verifyaccount');
    }

    
};
