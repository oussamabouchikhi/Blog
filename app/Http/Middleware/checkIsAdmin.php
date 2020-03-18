<?php

namespace App\Http\Middleware;

use Closure;

class checkIsAdmin
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

        // if the authenticated user is not admin
        if (!auth()->user()->isAdmin()) {
            # redirect to home page
            return redirect('home');
        }

        return $next($request);
    }
}
