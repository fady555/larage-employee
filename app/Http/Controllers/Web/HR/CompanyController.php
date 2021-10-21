<?php

namespace App\Http\Controllers\Web\HR;

use App\Address;
use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $company = Company::with(['address.country','address.city'])->first();

        //return $company->address;


        return view('hr.company')->with(['company'=>$company]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = validator($request->all(),$this->rules(),[],$this->attributes());

        if($result->fails()):
            return redirect()->back()->withErrors($result)->withInput();
        endif;

        $inputs = $request->except('_token');


        $inputs['address_id'] = Address::insertGetId([
            'address_desc_en'=>request()->input('address_desc_en'),
            'address_desc_ar'=>request()->input('address_desc_ar'),
            'country_id'=>request()->input('country_id'),
            'city_id'=>request()->input('city_id'),

        ]);

        if(isset($inputs['logo'])): $inputs['logo'] = str_replace("public","/public/storage",request()->file('logo')->store('/public')) ;endif;


        Company::create( $inputs);
        session()->flash('message',trans('app.add_success'));

        return back();


    }







    public  function rules(){
        return [
        'name_company_en'=>['required','string'],
        'name_company_ar'=>['required','string'],
        'logo'=>['nullable','file','mimes:png,jpg'],
        'description_en'=>['required','string'],
        'description_ar'=>['required','string'],
        "country_id"=>['required','exists:countries,id'],
        "city_id"=>['nullable','exists:cities,id'],
        'telphones'=>['nullable','string'],
        ];
    }
    public  function attributes(){
        return [
            'name_company_en'=>trans('app.name_company_ar'),
            'name_company_ar'=>trans('app.name_company_ar'),
            'logo'=>trans('app.logo'),
            'description_en'=>trans('app.description_en'),
            'description_ar'=>trans('app.description_ar'),
            "country_id"=>trans('app.country'),
            "city_id"=>trans('app.city'),
            'telphones'=>trans('app.telphones'),
        ];
    }

    public function update(Request $request, $id)
    {


        $result = validator($request->all(),$this->rules(),[],$this->attributes());

        if($result->fails()):
            return redirect()->back()->withErrors($result)->withInput();
        endif;

        $inputs = $request->except('_token');


        $inputs['address_id'] = Address::insertGetId([
            'address_desc_en'=>request()->input('address_desc_en'),
            'address_desc_ar'=>request()->input('address_desc_ar'),
            'country_id'=>request()->input('country_id'),
            'city_id'=>request()->input('city_id'),

        ]);

        if(isset($inputs['logo'])): $inputs['logo'] = str_replace("public","/public/storage",request()->file('logo')->store('/public')) ;endif;


        //dd($inputs);
        Company::find($id)->update($inputs);
        session()->flash('message',trans('app.edit_success'));

        return back();

    }


}
