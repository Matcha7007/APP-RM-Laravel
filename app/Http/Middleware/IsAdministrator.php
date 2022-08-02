<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdministrator
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
        if(!auth()->check()){
            return redirect('/login');
        }
        $user = auth()->user()->role_id;
        if(auth()->guest() || $user !== 1){
            abort(403);
        }
        return $next($request);
        // if($user === 1){
        // }
        // if($user !== 1){
        //     abort(403);
        // }
    }
}
