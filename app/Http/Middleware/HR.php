<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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

        session()->flash('message',trans('app.hr_page').'<script> (document.getElementsByClassName("alert-success")[0]).classList.add("alert-danger") </script>');
        Auth::logout();
        return redirect('/login');
    }
}
