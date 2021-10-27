<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Employee extends Model
{
    protected $table='employees';
    protected $fillable = [
        'full_name_ar',
        'full_name_en',
        'age',
        'avatar',
        'data_of_start_work',
        'number_file',
        'national_id',
        'national_card_img',
        'national_card_address_description',
        'national_card_Release_date',
        'passport_id',
        'nationality_id',
        'passport_address_description',
        'passport_release_date',
        'passport_expire_date',
        'email',
        'phone',
        'name_of_bank',
        'number_of_account',
        'number_of_wif_husband',
        'number_of_wif_children',
        'time_of_attendees',
        'time_of_go',
        'experience_description',
        'address_id',
        'jop_id',
        'degree_id',
        'education_status_id',
        'level_experience_id',
        'contract_id',
        'salary_id',
        'marital_status_id',
        'military_service_id',
        'company_id',
        'direct_employee_id',
        'military_services_id',
        'comapny_departments_id',
        'marital_statuses_id',
        'fixed_salary',
        'military_services_id'



    ];


    //protected $dateFormat = 'Y-d-m';


    public function address(){
        return $this->belongsTo('App\Address','address_id','id');
    }
    public function jop(){
        return $this->belongsTo('App\Jop','jop_id','id');
    }
    public function degree(){
        return $this->belongsTo('App\Degree','degree_id','id');
    }
    public function education(){
        return $this->belongsTo('App\Education','education_status_id','id');
    }
    public function experience(){
        return $this->belongsTo('App\Experience','level_experience_id','id');
    }
    public function contract(){
        return $this->belongsTo('App\Contract','contract_id','id');
    }
    public function marital_status(){
        return $this->belongsTo('App\MaritalStatus','marital_status_id','id');
    }
    public function militar_service(){
        return $this->belongsTo('App\MilitaryService','military_service_id','id');
    }

    public function direct(){
        return $this->hasMany(Employee::class,'direct_employee_id','id');
    }

    public function user(){
        return $this->hasOne(User::class,'id');
    }

}
