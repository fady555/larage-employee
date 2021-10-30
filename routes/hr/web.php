<?php

use App\Employee;
use App\Http\Controllers\web\hr\DegreeController;
use Illuminate\Support\Facades\Route;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use App\Http\Controllers\Web\HR\EmployeeController;
use Illuminate\Support\Facades\DB;

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
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth','hr'],
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

    Route::post('store-type-work','TypeWorkController@store')->name('store.type.work');

    Route::get('edit-type-work/{id?}','TypeWorkController@edit')->name('edit.type.work');
    Route::post('update-type-work/{id?}','TypeWorkController@update')->name('update.type.work');

    Route::post('delete-type-work/{id?}','TypeWorkController@destroy')->name('delete.type.work');

    //educations

    Route::get('show-educations','EducationController@index')->name('show.educations');

    Route::post('store-education','EducationController@store')->name('store.education');

    Route::get('edit-education/{id?}','EducationController@edit')->name('edit.education');
    Route::post('update-education/{id?}','EducationController@update')->name('update.education');

    Route::post('delete-education/{id?}','EducationController@destroy')->name('delete.education');

    //level_experience

    Route::get('show-levels-experiences','LevelExperienceController@index')->name('show.levels.experiences');

    Route::post('store-level-experience','LevelExperienceController@store')->name('store.level.experience');

    Route::get('edit-level-experience/{id?}','LevelExperienceController@edit')->name('edit.level.experience');
    Route::post('update-level-experience/{id?}','LevelExperienceController@update')->name('update.level.experience');

    Route::post('delete-level-experience/{id?}','LevelExperienceController@destroy')->name('delete.level.experience');

    //degreee

    Route::get('show-degrees','DegreeController@index')->name('show.degrees');

    Route::post('store-degree','DegreeController@store')->name('store.degree');

    Route::get('edit-degree/{id?}','DegreeController@edit')->name('edit.degree');


    Route::post('update-degree/{id?}','DegreeController@update')->name('update.degree');

    Route::post('delete-degree/{id?}','DegreeController@destroy')->name('delete.degree');





    //company

    Route::get('show-company','CompanyController@index')->name('show.company');

    Route::post('store-company','CompanyController@store')->name('store.company');

    Route::post('update-company/{id?}','CompanyController@update')->name('update.company');

    //company department

    Route::get('show-companies-departments','CompanyDepartmentController@index')->name('show.companies.departments');

    Route::post('store-company-department','CompanyDepartmentController@store')->name('store.company.department');

    Route::get('edit-company-department/{id?}','CompanyDepartmentController@edit')->name('edit.company.department');
    Route::post('update-company-department/{id?}','CompanyDepartmentController@update')->name('update.company.department');

    Route::post('delete-company-department/{id?}','CompanyDepartmentController@destroy')->name('delete.company.department');

    //conpany branch

    Route::get('show-companies-branch','CompanyBranchController@index')->name('show.companies.branchs');

    Route::post('store-company-branch','CompanyBranchController@store')->name('store.company.branch');

    Route::get('edit-company-branch/{id?}','CompanyBranchController@edit')->name('edit.company.branch');
    Route::post('update-company-branch/{id?}','CompanyBranchController@update')->name('update.company.branch');

    Route::post('delete-company-branch/{id?}','CompanyBranchController@destroy')->name('delete.company.branch');


    //events and effects

    Route::get('show-events-effects/{forWhom?}','EventAndEffectController@index')->name('show.events.effects');

    Route::post('store-event-effect','EventAndEffectController@store')->name('store.event.effect');

    Route::get('edit-event-effect/{id?}/{forWhom?}','EventAndEffectController@edit')->name('edit.event.effect');
    Route::post('update-event-effect/{id?}','EventAndEffectController@update')->name('update.event.effect');

    Route::post('delete-event-effect/{id?}','EventAndEffectController@destroy')->name('delete.event.effect');





    //genenrals

    Route::get('show-generals','GeneralController@index')->name('show.generals');

    Route::post('store-general','GeneralController@store')->name('store.general');

    ///Route::get('edit-general/{id?}','GeneralController@edit')->name('edit.general');
    Route::post('update-general/{id?}','GeneralController@update')->name('update.general');

    Route::post('delete-general/{id?}','GeneralController@destroy')->name('delete.general');


    //show notification


    Route::get('show-notifications','ShowNotiController@index')->name('show.notifications');


    //get employee respon from for
    Route::get('getemployee-from-for/{branch?}/{department?}/{level?}', function ($branch,$department,$level)
     {


        //return $branch.$department.$level;



        if($level == 3):
            $employeeFrom =Employee::where('jop_level_id',$level-1)->get();
        elseif($level == 4):
            $employeeFrom =Employee::where('company_branch_id',$branch)->where('comapny_departments_id',$department)->where('jop_level_id',$level-1)->get();
        endif;


        if($level == 3):
            $employeeFor =Employee::where('jop_level_id',$level+1)->get();
        elseif($level == 4):
            $employeeFor =Employee::where('company_branch_id',$branch)->where('comapny_departments_id',$department)->where('jop_level_id',$level+1)->get();
        endif;



        $data[] = $employeeFrom;
        $data[] = $employeeFor;


        return json_encode($data);


    })->name('form.for');





    //executive manger
    Route::get('show-executive-manger','BasicEmployeeController@editMangerEceutive')->name('show.executive.manger');
    Route::post('update-executive-manger','BasicEmployeeController@updateMangerEceutive')->name('update.executive.manger');

    //genral manger
    Route::get('show-general-manger','BasicEmployeeController@editGeneralManger')->name('show.general.manger');
    Route::post('update-general-manger','BasicEmployeeController@updateGeneralManger')->name('update.general.manger');

    //hr
    Route::get('show-hr-manger','BasicEmployeeController@editHrDirect')->name('show.hr.manger');
    Route::post('update-hr-manger','BasicEmployeeController@updateHrDirect')->name('update.hr.manger');







});




