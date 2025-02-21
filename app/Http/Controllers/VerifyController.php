<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class VerifyController extends Controller
{
    //
    public function verifyaccount():View{
        return view('movies.verifyaccount');
    }

    public function useractivation(Request $request){
        $getToken=$request->token;
        $getToken=Verifytoken::where('token',$getToken)->first();

        if($getToken){
            $getToken->is_activated=1;
            $getToken->save();

            $user=User::where('email',$getToken->email)->first();
            if(! $user){
                return redirect()->route('movie')->with('error','Invalid token');
            }
            $user->is_activated=1;
            $user->save();
            $gettingToken->delete();
            return redirect()->route('movie')->with('activated','Your account has been activated successfully');
        }
        else{
            return redirect()->route('verifyaccount')->with('error','Invalid token');
        }
    }

}
