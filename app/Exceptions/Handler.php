<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{

    protected $dontReport = [
        //
    ];


    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];


    public function report(Throwable $exception)
    {
        parent::report($exception);
    }


    public function render($request, Throwable $exception)
    {

        return parent::render($request, $exception);

    }


    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            $content = array(
                'success' => false,
                'data' => [],
                'message' => 'No Unauthenticated',
            );

            return response($content)->setStatusCode(401);

        }

        return redirect()->guest('login');
    }
}
