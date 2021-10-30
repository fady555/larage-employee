<?php

namespace App\Http\Middleware;

use Closure;

class HeadHR
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

        if(auth()->user()->id == 3): return $next($request); endif;
        return redirect('/login');

    }
}
