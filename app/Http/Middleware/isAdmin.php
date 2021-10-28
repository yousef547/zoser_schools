<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAdmin
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
       
        //  $roleName = Auth::user()->role;
        //  $roleName = false;
        //  if (Auth::user()->role == 'admin') {
             return $next($request);
        // } 
        //     return redirect(url('/'));
    }
}
