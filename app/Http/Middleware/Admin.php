<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
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
        // $roleName = Auth::user()->role_id;
        if (Auth::User()->role == 'student' && Auth::check()) {
            return $next($request);
        }
        return back()->with('msg', 'Successed Update meeting');
    }
}
