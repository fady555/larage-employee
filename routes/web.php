<?php

use App\City;
use App\CompanyBranch;
use App\Employee;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
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


});


Route::get('dir',function (){
    return \App\Employee::with('direct')->get();
});



Route::get('cities/{id?}',function($id){
    $citie =  City::where('country_id',$id)->get();
    return json_encode($citie);
});

Route::get('branchs/{id?}',function($id){
    $branchs =  CompanyBranch::where('company_id',$id)->get();
    return json_encode($branchs);
});



Route::get('levelJopId/{department_id?}/{LevelId?}',function($department_id,$LevelId){


    //return json_encode($department_id ."" . $LevelId);

    $Responsible_From  = Employee::select(['full_name_ar','full_name_en'])->where('comapny_departments_id',$department_id)->where('jop_level_id',$LevelId-1)->get();

    $Responsible_For   = Employee::select(['full_name_ar','full_name_en'])->where('jop_level_id',$LevelId+1)->get();


    return json_encode([$Responsible_From,$Responsible_For]) ;


});



Route::get('read-nofifications/{id?}',function($id){

    User::find($id)->notifications->markAsRead();

});


Route::get('img/{a?}/{b?}', [
    'as'         => 'img.show',
    'uses'       => 'ImagesController@show',
    'middleware' => 'auth',
]);

//{{URL("/img/".'national_card_imgs/5un422FebQH1SVdbHipqzSPIAs6w5uFuoAdGL201.jpg')}}


Route::view('/ii', 'hr.basic');












