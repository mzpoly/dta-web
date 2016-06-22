<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotDriver
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
        if (!$request->session()->has('loggedIn') || $request->session()->get("loggedIn")!=true) {
            return redirect('/'); // change to page not found?
        }
        return $next($request);
    }
}
