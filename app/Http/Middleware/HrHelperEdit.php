<?php

namespace App\Http\Middleware;

use App\Employee;
use App\User;
use Closure;

class HrHelperEdit
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

       $user =  User::where('employee_id',$request->route('id'))->where('as','HR')->exists();

       if($user):
            return $next($request);
       else:
            abort(404);
       endif;



    }
}
