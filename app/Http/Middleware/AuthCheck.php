<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $level=array_slice(func_get_args(), 2);
        if (!Auth::check()) {
            return route('login.admin');
        }
        else{
            $authen=Auth::user();
            foreach($level as $level){
                if ($authen->level==$level) {
                    return $next($request);
                }
            }
            abort(404);   
        }
        
    }
}
