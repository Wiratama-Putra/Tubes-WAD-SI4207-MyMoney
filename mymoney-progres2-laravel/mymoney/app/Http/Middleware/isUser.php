<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isUser
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
        if(auth()->user()->level === "user" && !auth()->user()->is_active) // 1 0
        {
            return redirect('/banned');
        } else if(auth()->user()->level === "user" && auth()->user()->is_active){
            return $next($request);
        }
        return redirect('/admin');
    }
}
