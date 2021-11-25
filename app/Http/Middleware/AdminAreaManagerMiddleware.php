<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAreaManagerMiddleware
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
        if(Auth::user()->action_table == 'App\Admin'){
            return $next($request);
        }elseif (Auth::user()->action_table == 'App\AreaManager'){
            return $next($request);
        }
        abort(403);
    }
}
