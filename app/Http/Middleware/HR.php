<?php

namespace App\Http\Middleware;

use Closure;

use function GuzzleHttp\json_decode;

class HR
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
        if(auth()->user()->as == 'HR'): return $next($request); endif;
        return redirect('/login');
    }
}
