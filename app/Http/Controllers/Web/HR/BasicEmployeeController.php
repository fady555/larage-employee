<?php

namespace App\Http\Controllers\web\hr;

use App\Employee;
use App\Address;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\Arabic;
use App\Rules\PhoneCode;

class BasicEmployeeController extends Controller
{

    //---------------executive manger ---------------
    public function editMangerEceutive(){

         $employee = Employee::with(['address'])->first();

        return view('hr.excutive_manger')->with(['employee'=>$employee]);

    }




    public function updateMangerEceutive(Request $request,$id=1){


        //return $request->all();

        $result = validator($request->all(),$this->rules($id),[],$this->customAttributes());

        if($result->fails()):
            return redirect()->back()->withErrors($result)->withInput();
        endif;


        $editEmployee = request()->except('_token');


        
        if(isset($editEmployee['avatar'])): $editEmployee['avatar'] = request()->file('avatar')->store('/avatars');endif;
        if(isset($editEmployee['national_card_img'])): $editEmployee['national_card_img'] = request()->file('national_card_img')->store('/national_card_imgs');  endif;

        if(!isset($editEmployee['military_services_id'])): $editEmployee['military_services_id'] = 1; endif;




        $x = Employee::with(['address'])->find($id)->update($editEmployee);


        session()->flash('message',trans('app.edit_success'));

        return back();

    }

    //-----------------Gneral manger -------------------
    public function editGeneralManger(){

    }

    public function updateGeneralManger(){

    }

    //------------------Hr director -----------------

    public function editHrDirect(){

    }

    public function updateHrDirect(){

    }
    //-----------------------------------------------


    private  function rules($id)
    {
        return [

                "full_name_en"=>['required','string','unique:employees,full_name_en,'.$id],
                "full_name_ar"=>['required',new Arabic(trans('app.name must arabic'))],
                "national_id"=>['required','string'],
                "national_card_Release_date"=>['required','date','date_format:Y-m-d'],
                "passport_id"=>['nullable','string','max:12'],
                "passport_release_date"=>['nullable','date','date_format:Y-m-d'],
                "passport_expire_date"=>['nullable','date','date_format:Y-m-d'],
                "nationality_id"=>['required','exists:nationalities,id'],
                "gender"=>['required','in:F,M'],
                "age"=>['required','numeric','between:1,99'],
                "military_services_id"=>['nullable','exists:military_services,id'],
                "marital_statuses_id"=>['required','exists:marital_statuses,id'],
                "number_of_wif_husband"=>['nullable','numeric','between:1,4'],
                "number_of_wif_children"=>['nullable','numeric','between:1,4'],
                "name_of_bank"=>['nullable','string'],
                "number_of_account"=>['nullable','string'],
                "email"=>['required','email','unique:Employees,email,'.$id],

                "phone"=>['required','string',new PhoneCode(trans('app.error_phone'))],

                "country_id"=>['required','exists:countries,id'],
                "city_id"=>['nullable','exists:cities,id'],
                "address_desc_en"=>['required','string'],
                "address_desc_ar"=>['required','string',new Arabic(trans('app.address must arabic'))],
                "national_card_address_description"=>['nullable','string'],
                "passport_address_description"=>['nullable','string'],
                "degree_id"=>['required','exists:degrees,id'],
                "experience_description"=>['required','string'],


                'fixed_salary'=>['nullable','numeric','min:0','max:1000000'],

                "type_work_id"=>['nullable','exists:type_of_works,id'],
                
                "avatar"=>['nullable','file','mimes:png,jpg','max:4000'],
                "national_card_img"=>['nullable','file','mimes:png,jpg','max:4000'],

            ];
    }


    private  function customAttributes()
    {
        return [

            "full_name_en"=>trans('app.full name by english'),
            "full_name_ar"=>trans('app.full name by arabic'),
            "national_id"=>trans('app.national id'),
            "national_card_Release_date"=>trans('app.national_card_Release_date'),
            "passport_id"=>trans('app.passport_id'),
            "passport_release_date"=>trans('app.passport_release_date'),
            "passport_expire_date"=>trans('app.passport_expire_date'),
            "nationality_id"=>trans('app.nationality'),
            "gender"=>trans('app.gender'),
            "age"=>trans('app.age'),
            "military_services_id"=>trans('app.military_services'),
            "marital_statuses_id"=>trans('app.marital_statuses'),
            "number_of_wif_husband"=>trans('app.number_of_wif_husband'),
            "number_of_wif_children"=>trans('app.number_of_wif_children'),
            "name_of_bank"=>trans('app.name_of_bank'),
            "number_of_account"=>trans('app.number_of_account'),
            "email"=>trans('app.email'),

            "phone"=>trans('app.phone'),


            "city_id"=>trans('app.city'),
            "address_desc_en"=>trans('app.current address en'),
            "address_desc_ar"=>trans('app.current address ar'),
            "national_card_address_description"=>trans('app.national_card_address_description'),
            "passport_address_description"=>trans('app.passport_address_description'),
            "degree_id"=>trans('app.degree'),
            "experience_description"=>trans('app.experience_description'),

            "type_work_id"=>trans('app.type work'),
            "avatar"=>trans('app.avatar'),
            "national_card_img"=>trans('app.national card img'),

        ];
    }


}
