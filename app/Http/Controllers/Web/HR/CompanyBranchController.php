<?php

namespace App\Http\Controllers\Web\HR;

use App\Address;
use App\CompanyBranch;
use App\Http\Controllers\Controller;
use App\Rules\Arabic;
use Illuminate\Http\Request;

class CompanyBranchController extends Controller
{
    public function index()
    {
        return view('hr.company_branch')->with(['branchs'=>CompanyBranch::with(['address.country','address.city'])->where('status','A')->get()]);
    }

    public function attributes()
    {
        return [
            'name_branch_en' => trans('app.name_branch_en'),
            'name_branch_ar' => trans('app.name_branch_ar'),
            'address_desc_en'=>trans('app.current address en'),
            'address_desc_ar'=>trans('app.current address ar'),
            "country_id"=>trans('app.country'),
            "city_id"=>trans('app.city'),
            'telphones'=>trans('app.telphones'),
        ];
    }

    public function rules()
    {
        return [
            'name_branch_en' =>['required','string','unique:company_branches,name_branch_en'],
            'name_branch_ar' =>['required','string',new Arabic(trans('app.name must arabic')),'unique:company_branches,name_branch_ar'],
            'address_desc_en'=>['required','string'],
            'address_desc_ar'=>['required','string'],
            "country_id"=>['required','exists:countries,id'],
            "city_id"=>['nullable','exists:cities,id'],
            'telphones'=>['nullable','string'],

        ];
    }

    public function rulesEdit($idd)
    {
        return [
            'name_branch_en' =>['required','string','unique:company_branches,name_branch_en,'.$idd],
            'name_branch_ar' =>['required','string',new Arabic(trans('app.name must arabic')),'unique:company_branches,name_branch_ar,'.$idd],
            'address_desc_en'=>['required','string'],
            'address_desc_ar'=>['required','string'],
            "country_id"=>['required','exists:countries,id'],
            "city_id"=>['nullable','exists:cities,id'],
            'telphones'=>['nullable','string'],

        ];
    }

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

        CompanyBranch::create($inputs);
        session()->flash('message',trans('app.add_success'));

        return back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('hr.company_branch')->with(['branch'=>CompanyBranch::with(['address.country','address.city'])->where('status','A')->find($id),'branchs'=>CompanyBranch::with(['address.country','address.city'])->where('status','A')->get()]);
    }


    public function update(Request $request, $id)
    {


        $protect = [1];
        if(in_array($id,$protect)){
            return back();
        }

        $result = validator($request->all(),$this->rulesEdit($id),[],$this->attributes());

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


        CompanyBranch::find($id)->update($inputs);
        session()->flash('message',trans('app.edit_success'));

        return back();
    }


    public function destroy($id)
    {

        $protect = [1];
        if(in_array($id,$protect)){
            return true;
        }

        CompanyBranch::destroy($id);

        return true;

    }
}
