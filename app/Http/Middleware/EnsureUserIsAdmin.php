<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(auth()->check()){
            if((auth()->user()->is_admin==0)){
                abort(403,"Unauthorized action");
            }
            else{
                return $next($request);
            }
        }
        return redirect(route('movie.loginpage'));
        
    }
}
