<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/








$group = [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
];

Route::group($group,function (){


    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes(['verify' => true,'register'=>false]);

    Route::get('/home', 'HomeController@index')->name('home');



    //Route::view('view','hr.basic');
    Route::view('view','hr.createEmployee');


});


Route::get('dir',function (){
    return \App\Employee::with('direct')->get();
});




