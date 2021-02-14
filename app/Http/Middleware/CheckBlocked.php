<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckBlocked
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
        if (Auth::user()->statues == 'blocked'){
            return redirect()->route('main')->with('message', 'لا يمكنك الوصول للصفحة لأن حسابك محظور');
        }
        return $next($request);
    }
}
