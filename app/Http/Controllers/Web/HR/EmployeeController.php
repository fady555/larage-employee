<?php

namespace App\Http\Controllers\Web\HR;

use App\Address;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Rules\Arabic;
use App\Rules\PhoneCode;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function GuzzleHttp\json_encode;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hr.createEmployee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    private  function rules()
    {
        return [

                "full_name_en"=>['required','string'],
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
                "email"=>['required','email','unique:employees,email','unique:users,email'],

                "phone"=>['required','string',new PhoneCode(trans('app.error_phone'))],

                "country_id"=>['required','exists:countries,id'],
                "city_id"=>['nullable','exists:cities,id'],
                "address_desc_en"=>['required','string'],
                "address_desc_ar"=>['required','string',new Arabic(trans('app.address must arabic'))],
                "national_card_address_description"=>['nullable','string'],
                "passport_address_description"=>['nullable','string'],
                "degree_id"=>['required','exists:degrees,id'],
                "experience_description"=>['required','string'],
                "jop_id"=>['required','exists:jops,id'],

                'time_of_attendees'=>['required','date_format:H:i'],
                'time_of_go'=>['required','date_format:H:i'],

                'fixed_salary'=>['required','numeric','min:0','max:1000000'],

                "type_work_id"=>['required','exists:type_of_works,id'],
                "company_id"=>['required','exists:companies,id'],
                "branch_id"=>['required','exists:company_branches,id'],
                "comapny_departments_id"=>['required','exists:comapny_departments,id'],
                "jop_level_id"=>['required','exists:jop_levels,id'],
                "number_file"=>['nullable','string'],
                "avatar"=>['nullable','file','mimes:pdf','max:4000'],
                "national_card_img"=>['required','file','mimes:pdf','max:4000'],

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
            "jop_id"=>trans('app.jop'),
            'time_of_attendees'=>trans('app.time_of_attendees'),
            'time_of_go'=>trans('app.time_of_go'),
            "type_work_id"=>trans('app.type work'),
            "company_id"=>trans('app.company'),
            "branch_id"=>trans('app.branch'),
            "comapny_departments_id"=>trans('app.company departement'),
            "jop_level_id"=>trans('app.jop level'),
            "number_file"=>trans('app.file number'),
            "avatar"=>trans('app.avatar'),
            "national_card_img"=>trans('app.national card img'),

            //"address_id"=>trans('app.address'),

        ];
    }


    public function store(Request $request)
    {





        //dd($request->all());

        $result = validator($request->all(),$this->rules(),[],$this->customAttributes());

        if($result->fails()){
            return back()->withErrors($result)->withInput();
        }


        $newEmployee = request()->all();


        if(isset($newEmployee['avatar'])): $newEmployee['avatar'] = request()->file('avatar')->store('/avatars');endif;
        if(isset($newEmployee['national_card_img'])): $newEmployee['national_card_img'] = request()->file('national_card_img')->store('/national_card_imgs');  endif;

        if(!isset($newEmployee['military_services_id'])): $newEmployee['military_services_id'] = 1; endif;



        $newEmployee['address_id'] = Address::insertGetId([
            'address_desc_en'=>request()->input('address_desc_en'),
            'address_desc_ar'=>request()->input('address_desc_ar'),
            'country_id'=>request()->input('country_id'),
            'city_id'=>request()->input('city_id'),

        ]);


        $x = Employee::create($newEmployee);

        User::create(['name'=>$request->full_name_en,'email'=>$request->email,'password'=>Hash::make(env('Defult_Password_Employee','tests2020')),'employee_id'=>$x->id]);

    return "add employee sucess ";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
