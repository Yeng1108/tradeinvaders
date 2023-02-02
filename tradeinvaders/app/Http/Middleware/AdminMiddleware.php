<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            //admin
            if(Auth::user()->role == '1'){
                return $next($request);
            }
            else{
                return redirect('/profile')->with('message','Access Denied as you are not Admin!');
            }


        }
        else{
            return redirect('/login')->with('message','Login to access the website');
        }
        
    }
}
