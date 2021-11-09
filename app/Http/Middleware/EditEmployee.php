<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class EditEmployee
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
        $request->route('id');

        $user =  User::where('employee_id',$request->route('id'))->where('as','ONTHER')->exists();

        if($user):
             return $next($request);
        else:
             abort(404);
        endif;

    }
}
