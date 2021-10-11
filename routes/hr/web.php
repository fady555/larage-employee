<?php

use Illuminate\Support\Facades\Route;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use App\Http\Controllers\Web\HR\EmployeeController;

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

    //employee

    //Route::get('show-employees','EmployeeController@index')->name('show.employees');

    Route::get('show-employee/{id?}','EmployeeController@show')->name('show.employee');


    Route::get('create-employee','EmployeeController@create')->name('create.employee');
    Route::post('store-employee','EmployeeController@store')->name('store.employee');

    Route::get('edit-employee/{id?}','EmployeeController@edit')->name('edit.employee');
    Route::post('update-employee/{id?}','EmployeeController@update')->name('update.employee');


    Route::post('delete-employee/{id?}','EmployeeController@update')->name('update.employee');






});

