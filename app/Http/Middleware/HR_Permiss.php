<?php

namespace App\Http\Middleware;

use Closure;

class HR_Permiss
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$num_permiss)
    {
        if(in_array($num_permiss,json_decode(auth()->user()->permissions_array))): return $next($request); endif;
        return redirect('/login');
    }
}
