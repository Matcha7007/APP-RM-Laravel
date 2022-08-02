<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
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
        // dd(auth()->user()->role_id);
        if(!auth()->check()){
            return redirect('/login');
        }
        if(auth()->guest()){
            abort(403);
        }
        $user = auth()->user()->role_id;
        if($user === 1 || $user === 2)
            return $next($request);
    }
}
