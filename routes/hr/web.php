<?php

use App\Employee;
use App\Http\Controllers\web\hr\DegreeController;
use Illuminate\Support\Facades\Route;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use App\Http\Controllers\Web\HR\EmployeeController;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;

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
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth','verified','hr'],
];

Route::group($group,function (){

    //employee

    Route::get('show-employees','EmployeeController@index')->name('show.employees')->middleware('hr_perm:1');

    Route::get('create-employee','EmployeeController@create')->name('create.employee')->middleware('hr_perm:2');
    Route::post('store-employee','EmployeeController@store')->name('store.employee')->middleware('hr_perm:2');

    Route::get('edit-employee/{id?}','EmployeeController@edit')->where('id','[4-g]')->name('edit.employee')->middleware(['employee_edit','hr_perm:3']);
    Route::post('update-employee/{id?}','EmployeeController@update')->where('id','[4-g]')->name('update.employee')->middleware(['employee_edit','hr_perm:3']);


    Route::post('delete-employee/{id?}','EmployeeController@destroy')->where('id','[4-g]')->name('delete.employee')->middleware(['employee_edit','hr_perm:4']);




    //jops

    Route::get('show-jops','JopController@index')->name('show.jops')->middleware('hr_perm:5');

    Route::post('store-jop','JopController@store')->name('store.jop')->middleware('hr_perm:6');

    Route::get('edit-jop/{id?}','JopController@edit')->name('edit.jop')->middleware('hr_perm:7');
    Route::post('update-jop/{id?}','JopController@update')->name('update.jop')->middleware('hr_perm:7');

    Route::post('delete-jop/{id?}','JopController@destroy')->name('delete.jop')->middleware('hr_perm:8');

    //type of work
    Route::get('show-types-works','TypeWorkController@index')->name('show.types.work')->middleware('hr_perm:9');

    Route::post('store-type-work','TypeWorkController@store')->name('store.type.work')->middleware('hr_perm:10');

    Route::get('edit-type-work/{id?}','TypeWorkController@edit')->name('edit.type.work')->middleware('hr_perm:11');
    Route::post('update-type-work/{id?}','TypeWorkController@update')->name('update.type.work')->middleware('hr_perm:11');

    Route::post('delete-type-work/{id?}','TypeWorkController@destroy')->name('delete.type.work')->middleware('hr_perm:12');

    //educations

    Route::get('show-educations','EducationController@index')->name('show.educations')->middleware('hr_perm:13');

    Route::post('store-education','EducationController@store')->name('store.education')->middleware('hr_perm:14');

    Route::get('edit-education/{id?}','EducationController@edit')->name('edit.education')->middleware('hr_perm:15');
    Route::post('update-education/{id?}','EducationController@update')->name('update.education')->middleware('hr_perm:15');

    Route::post('delete-education/{id?}','EducationController@destroy')->name('delete.education')->middleware('hr_perm:16');

    //level_experience

    Route::get('show-levels-experiences','LevelExperienceController@index')->name('show.levels.experiences')->middleware('hr_perm:17');

    Route::post('store-level-experience','LevelExperienceController@store')->name('store.level.experience')->middleware('hr_perm:18');

    Route::get('edit-level-experience/{id?}','LevelExperienceController@edit')->name('edit.level.experience')->middleware('hr_perm:19');
    Route::post('update-level-experience/{id?}','LevelExperienceController@update')->name('update.level.experience')->middleware('hr_perm:19');

    Route::post('delete-level-experience/{id?}','LevelExperienceController@destroy')->name('delete.level.experience')->middleware('hr_perm:20');

    //degreee

    Route::get('show-degrees','DegreeController@index')->name('show.degrees')->middleware('hr_perm:21');

    Route::post('store-degree','DegreeController@store')->name('store.degree')->middleware('hr_perm:22');

    Route::get('edit-degree/{id?}','DegreeController@edit')->name('edit.degree')->middleware('hr_perm:23');
    Route::post('update-degree/{id?}','DegreeController@update')->name('update.degree')->middleware('hr_perm:23');

    Route::post('delete-degree/{id?}','DegreeController@destroy')->name('delete.degree')->middleware('hr_perm:24');





    //company

    Route::get('show-company','CompanyController@index')->name('show.company');

    Route::post('store-company','CompanyController@store')->name('store.company')->middleware('head_hr');

    Route::post('update-company/{id?}','CompanyController@update')->name('update.company')->middleware('head_hr');

    //company department

    Route::get('show-companies-departments','CompanyDepartmentController@index')->name('show.companies.departments')->middleware('hr_perm:25');

    Route::post('store-company-department','CompanyDepartmentController@store')->name('store.company.department')->middleware('hr_perm:26');

    Route::get('edit-company-department/{id?}','CompanyDepartmentController@edit')->name('edit.company.department')->middleware('hr_perm:27');
    Route::post('update-company-department/{id?}','CompanyDepartmentController@update')->name('update.company.department')->middleware('hr_perm:27');

    Route::post('delete-company-department/{id?}','CompanyDepartmentController@destroy')->name('delete.company.department')->middleware('hr_perm:28');

    //conpany branch

    Route::get('show-companies-branch','CompanyBranchController@index')->name('show.companies.branchs')->middleware('hr_perm:29');

    Route::post('store-company-branch','CompanyBranchController@store')->name('store.company.branch')->middleware('hr_perm:30');

    Route::get('edit-company-branch/{id?}','CompanyBranchController@edit')->name('edit.company.branch')->middleware('hr_perm:31');
    Route::post('update-company-branch/{id?}','CompanyBranchController@update')->name('update.company.branch')->middleware('hr_perm:31');

    Route::post('delete-company-branch/{id?}','CompanyBranchController@destroy')->name('delete.company.branch')->middleware('hr_perm:32');


    //events and effects

    Route::get('show-events-effects/{forWhom?}','EventAndEffectController@index')->name('show.events.effects')->middleware('hr_perm:33');

    Route::post('store-event-effect','EventAndEffectController@store')->name('store.event.effect')->middleware('hr_perm:34');

    Route::get('edit-event-effect/{id?}/{forWhom?}','EventAndEffectController@edit')->name('edit.event.effect')->middleware('hr_perm:35');
    Route::post('update-event-effect/{id?}','EventAndEffectController@update')->name('update.event.effect')->middleware('hr_perm:35');

    Route::post('delete-event-effect/{id?}','EventAndEffectController@destroy')->name('delete.event.effect')->middleware('hr_perm:36');





    //genenrals

    Route::get('show-generals','GeneralController@index')->name('show.generals')->middleware('hr_perm:37');

    Route::post('store-general','GeneralController@store')->name('store.general')->middleware('hr_perm:38');

    ///Route::get('edit-general/{id?}','GeneralController@edit')->name('edit.general')->middleware('hr_perm:39');
    Route::post('update-general/{id?}','GeneralController@update')->name('update.general')->middleware('hr_perm:39');

    Route::post('delete-general/{id?}','GeneralController@destroy')->name('delete.general')->middleware('hr_perm:40');


                                        //requests

    //leave request

    Route::get('show-leave-reqests/{branch_id?}','LeveRequestController@index')->name('show.leave.reqests')->middleware('hr_perm:41');

    Route::post('assign-leve-reqest/{id?}/{status?}','LeveRequestController@assign')
    ->name('assign.leave.reqests')
    ->where('status','[2-3]')
    ->middleware('hr_perm:41');

    Route::post('delete-leave-reqest/{id}','LeveRequestController@destroy')->name('delete.leave.reqest')->middleware('hr_perm:41');








    //show notification


    Route::get('show-notifications','ShowNotiController@index')->name('show.notifications');



    //get employee respon from for
    Route::get('getemployee-from-for/{branch?}/{department?}/{level?}', function ($branch,$department,$level)
     {


        //return $branch.$department.$level->middleware('hr_perm:30');

        if($level <=2 or $department <= 2 ):
            $data['from'] = [];
            $data['for'] = [];

            return json_encode($data);

        endif;



        if($level == 3):
            $employeeFrom =Employee::where('jop_level_id',$level-1)->get();
        elseif($level == 4):
            $employeeFrom =Employee::where('company_branch_id',$branch)->where('comapny_departments_id',$department)->where('jop_level_id',$level-1)->get();
        endif;


        if($level == 3):
            $employeeFor =Employee::where('company_branch_id',$branch)->where('comapny_departments_id',$department)->where('jop_level_id',$level+1)->get();
        elseif($level == 4):
            $employeeFor =[];
        endif;



        $data['from'] = $employeeFrom;
        $data['for'] = $employeeFor;


        return json_encode($data);


    })->name('form.for');


    Route::get('getemployee-from-for-edit/{branch?}/{department?}/{level?}/{employeeEditId?}', function ($branch,$department,$level,$employeeEditId)
    {


       //return $branch.$department.$level->middleware('hr_perm:30');

       if($level <=2 or $department <= 2 ):
           $data['from'] = [];
           $data['for'] = [];

           return json_encode($data);

       endif;



       if($level == 3):
           $employeeFrom =Employee::where('jop_level_id',$level-1)->get();
       elseif($level == 4):
           $employeeFrom =Employee::where('company_branch_id',$branch)->where('comapny_departments_id',$department)->where('jop_level_id',$level-1)->where('id','!=',$employeeEditId)->get();
       endif;


       if($level == 3):
           $employeeFor =Employee::where('company_branch_id',$branch)->where('comapny_departments_id',$department)->where('jop_level_id',$level+1)->get();
       elseif($level == 4):
           $employeeFor =[];
       endif;



       $data['from'] = $employeeFrom;
       $data['for'] = $employeeFor;


       return json_encode($data);


   })->name('form.for.edit');


    Route::get('cheeck-direct-exist/{branch?}/{department?}', function ($branch,$department) {

        $emLvel = Employee::where('company_branch_id',$branch)->where('comapny_departments_id',$department)->where('jop_level_id',3)->exists();

        if($emLvel): return true; else: return false;  endif;

    })->name('cheeck.direct.exist');



    // mangers
    Route::get('edit-manger/{id?}','BasicEmployeeController@edit')->where('id','[1-3]')->name('edit.manger');
    Route::post('update-manger/{id?}','BasicEmployeeController@update')->where('id','[1-3]')->name('update.manger');



    //hr_helper

    Route::get('show-hrs-helper','HrHelperController@index')->name('show.hrs.helpers')->middleware('head_hr');

    Route::get('add-hr-helper','HrHelperController@create')->name('add.hr.helper')->middleware('head_hr');
    Route::post('store-hr-helper','HrHelperController@store')->name('store.hr.helper')->middleware('head_hr');

    Route::get('edit-hr-helper/{id?}','HrHelperController@edit')->where('id','[4-g]')->name('edit.hr.helper')->middleware(['head_hr','hr_help_edit']);
    Route::post('update-hr-helper/{id?}','HrHelperController@update')->where('id','[4-g]')->name('update.hr.helper')->middleware(['head_hr','hr_help_edit']);

    Route::post('delete-hr-helper/{id?}','HrHelperController@destroy')->where('id','[4-g]')->name('delete.hr.helper')->middleware('head_hr');



    //search
    Route::get('search','SearchController@search')->name('search.employees');




});




