<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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
        if(Auth::guest()){
            return redirect('/')->with('message', 'Guests do not have access to dashboard');
        }  
        if (auth()->user()->userrole== 'admin') {
                return $next($request);
            }
    
    }
}
