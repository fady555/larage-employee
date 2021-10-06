<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('password/email',function (){
    $credentials = request()->validate(['email' => 'required|email']);

    Password::sendResetLink($credentials);

    return response()->json(["msg" => 'Reset password link sent on your email id.']);
});

Route::post('verifiy',function (){
    auth()->user()->sendEmailVerificationNotification();
    return response()->json(["msg" => "Email verification link sent on your email id"]);
})->middleware('auth:api');


