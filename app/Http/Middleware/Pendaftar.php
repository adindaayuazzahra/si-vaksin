<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Pendaftar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $level)
    {
        if(!Session::get('pendaftar')){
            return route('login.user');
        }
        else{
            return $next($request);
        }
        
    }
}
