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




    //jops

    Route::get('show-jops','JopController@index')->name('show.jops');

    Route::post('store-jop','JopController@store')->name('store.jop');

    Route::get('edit-jop/{id?}','JopController@edit')->name('edit.jop');
    Route::post('update-jop/{id?}','JopController@update')->name('update.jop');

    Route::post('delete-jop/{id?}','JopController@destroy')->name('delete.jop');

    //type of work
    Route::get('show-types-works','TypeWorkController@index')->name('show.types.work');

    Route::post('store-type-work','TypeWorkController@store')->name('store.type-work');

    Route::get('edit-type-work/{id?}','TypeWorkController@edit')->name('edit.type-work');
    Route::post('update-type-work/{id?}','TypeWorkController@update')->name('update.type-work');

    Route::post('delete-type-work/{id?}','TypeWorkController@destroy')->name('delete.type-work');
    //educations

    Route::get('show-types-works','TypeWorkController@index')->name('show.types.work');

    Route::post('store-type-work','TypeWorkController@store')->name('store.type-work');

    Route::get('edit-type-work/{id?}','TypeWorkController@edit')->name('edit.type-work');
    Route::post('update-type-work/{id?}','TypeWorkController@update')->name('update.type-work');

    Route::post('delete-type-work/{id?}','TypeWorkController@destroy')->name('delete.type-work');
    //level_experience

    Route::get('show-levels-experiences','LevelExperienceController@index')->name('show.levels.experiences');

    Route::post('store-level-experience','LevelExperienceController@store')->name('store.level-experience');

    Route::get('edit-level-experience/{id?}','LevelExperienceController@edit')->name('edit.level-experience');
    Route::post('update-level-experience/{id?}','LevelExperienceController@update')->name('update.level-experience');

    Route::post('delete-level-experience/{id?}','LevelExperienceController@destroy')->name('delete.level-experience');

    //degreee

    Route::get('show-degrees','DegreeController@index')->name('show.degrees');

    Route::post('store-degree','DegreeController@store')->name('store.degree');

    Route::get('edit-degree/{id?}','DegreeController@edit')->name('edit.degree');
    Route::post('update-degree/{id?}','DegreeController@update')->name('update.degree');

    Route::post('delete-degree/{id?}','DegreeController@destroy')->name('delete.degree');




    
    //company

    Route::get('show-companies','CompanyController@index')->name('show.companies');

    Route::post('store-degree','CompanyController@store')->name('store.degree');

    Route::get('edit-degree/{id?}','CompanyController@edit')->name('edit.degree');
    Route::post('update-degree/{id?}','CompanyController@update')->name('update.degree');

    Route::post('delete-degree/{id?}','CompanyController@destroy')->name('delete.degree');

    //company department

    Route::get('show-companies-departments','CompanyDepartment@index')->name('show.companies.departments');

    Route::post('store-company-department','CompanyDepartment@store')->name('store.company.department');

    Route::get('edit-company-department/{id?}','CompanyDepartment@edit')->name('edit.company.department');
    Route::post('update-company-department/{id?}','CompanyDepartment@update')->name('update.company.department');

    Route::post('delete-company-department/{id?}','CompanyDepartment@destroy')->name('delete.company.department');

    //conpany branch

    Route::get('show-companies-branch','CompanyBranch@index')->name('show.companies.branch');

    Route::post('store-company-branch','CompanyBranch@store')->name('store.company.branch');

    Route::get('edit-company-branch/{id?}','CompanyBranch@edit')->name('edit.company.branch');
    Route::post('update-company-branch/{id?}','CompanyBranch@update')->name('update.company.branch');

    Route::post('delete-company-branch/{id?}','CompanyBranch@destroy')->name('delete.company.branch');


    //generals

    //event






});

