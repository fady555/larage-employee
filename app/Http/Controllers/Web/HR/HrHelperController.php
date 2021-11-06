<?php

namespace App\Http\Controllers\web\hr;

use App\Address;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Permission;
use App\Rules\Arabic;
use App\Rules\PhoneCode;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\VarDumper\Cloner\Data;

class HrHelperController extends Controller
{
    public function index()
    {
        return view('hr.hr_helper')->with(['employees'=>Employee::where('jop_id',4)->get()]);
    }


    public function create(){
        return view('hr.hr_helper')->with(['permissions_array'=>Permission::get()]);
    }


    public function store(Request $request)
    {

        $result = validator($request->all(),$this->rules(),[],$this->customAttributes());

        if($result->fails()):
            return redirect()->back()->withErrors($result)->withInput();
        endif;

        $data  = $request->except('_token');
        $data['jop_id']= 4;
        $data['jop_level_id']= 4;

        if(isset($data['avatar'])): $data['avatar'] = request()->file('avatar')->store('/avatars');endif;
        if(isset($data['national_card_img'])): $data['national_card_img'] = request()->file('national_card_img')->store('/national_card_imgs');  endif;

        if(!isset($data['military_services_id'])): $data['military_services_id'] = 1; endif;


        $data['address_id'] = Address::insertGetId([
            'address_desc_en'=>request()->input('address_desc_en'),
            'address_desc_ar'=>request()->input('address_desc_ar'),
            'country_id'=>request()->input('country_id'),
            'city_id'=>request()->input('city_id'),

        ]);

        $data['company_id'] = 1;
        $data['company_branch_id'] = 1 ;

        $data['comapny_departments_id'] = 3 ;



        $em = Employee::create($data);

        User::create([
            'name'=>'hr_helper',
            'email'=>$em->email,
            'password'=>Hash::make($em->national_id),
            'employee_id'=>$em->id,
            'permissions_array'=>json_encode($request->permissions_array),
            'as'=>'HR',
        ]);

        session()->flash('message',trans('app.add_success'));
        return back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('hr.hr_helper')->with(['employee'=>Employee::with('user')->find($id),'permissions_array'=>Permission::get()]);
    }


    public function update(Request $request, $id)
    {

        $protect = [1,2,3];
        if(in_array($id,$protect)){
            return back();
        }
        $result = validator($request->all(),$this->rulesEdit($id),[],$this->customAttributes());

        if($result->fails()):
            return redirect()->back()->withErrors($result)->withInput();
        endif;

        $data  = $request->except('_token');
        $data['jop_id']= 4;
        $data['jop_level_id']= 4;

        Address::where('id',Employee::find($id)->address_id)->update([
            'address_desc_en'=>request()->input('address_desc_en'),
            'address_desc_ar'=>request()->input('address_desc_ar'),
            'country_id'=>request()->input('country_id'),
            'city_id'=>request()->input('city_id'),

        ]);



        Employee::find($id)->update($data);

        User::where('employee_id',$id)->update([
            'name'=>'hr_helper',
            'email'=>$request->email,
            'password'=>Hash::make($request->national_id),
            'permissions_array'=>json_encode($request->permissions_array),
            'as'=>'HR',
        ]);

        session()->flash('message',trans('app.edit_success'));

        return back();
    }


    public function destroy($id)
    {

        $protect = [1,2,3];
        if(in_array($id,$protect)){
            return true;
        }

        Employee::destroy($id);

        return true;

    }



    private  function rules()
    {
        return [

                "full_name_en"=>['required','string','unique:employees,full_name_en'],
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
                "email"=>['required','email','unique:Employees,email'],

                "phone"=>['required','string',new PhoneCode(trans('app.error_phone'))],

                "country_id"=>['required','exists:countries,id'],
                "city_id"=>['nullable','exists:cities,id'],
                "address_desc_en"=>['required','string'],
                "address_desc_ar"=>['required','string',new Arabic(trans('app.address must arabic'))],
                "national_card_address_description"=>['nullable','string'],
                "passport_address_description"=>['nullable','string'],
                "degree_id"=>['required','exists:degrees,id'],
                "experience_description"=>['required','string'],


                'fixed_salary'=>['required','numeric','min:0','max:1000000'],

                'time_of_attendees'=>['required','date_format:H:i'],
                'time_of_go'=>['required','date_format:H:i'],

                "type_work_id"=>['nullable','exists:type_of_works,id'],

                "avatar"=>['nullable','file','mimes:png,jpg','max:1000000'],
                "national_card_img"=>['nullable','file','mimes:png,jpg','max:1000000'],

            ];
    }
    private  function rulesEdit($id)
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


                'fixed_salary'=>['required','numeric','min:0','max:1000000'],
                'time_of_attendees'=>['required','date_format:H:i'],
                'time_of_go'=>['required','date_format:H:i'],

                "type_work_id"=>['nullable','exists:type_of_works,id'],

                "avatar"=>['nullable','file','mimes:png,jpg','max:1000000'],
                "national_card_img"=>['nullable','file','mimes:png,jpg','max:1000000'],

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
