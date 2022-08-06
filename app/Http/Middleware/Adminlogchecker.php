<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Adminlogchecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if no userid open : logout
           if(!Session()->has('adminid')){
            return redirect("noaccess2");
         }
         // if no admin logout : logout
         if(!Session()->has('PermissionAdmin')){
                return redirect("noaccess2");
         }
 
        return $next($request);
    }
}
