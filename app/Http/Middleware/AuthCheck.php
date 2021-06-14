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
        $pangkat=array_slice(func_get_args(), 2);
        if (!Auth::check()) {
            return route('login.admin');
        }
        else{
            foreach($pangkat as $admin){
                $authen=Auth::user();
                if ($authen->level==$admin) {
                    return $next($request);
                }
            }
            abort(404);   
        }
        
    }
}
