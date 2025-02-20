<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Verifytoken;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View{
        return view('movies.index');
    }

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
            $user->is_activated=1;
            $user->save();
            $gettingToken=Verifytoken::where('token',$getToken->token)->first();
            $gettingToken->delete();
            return redirect()->route('movie')->with('activated','Your account has been activated successfully');
        }
        else{
            return redirect()->route('verifyaccount')->with('error','Invalid token');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
