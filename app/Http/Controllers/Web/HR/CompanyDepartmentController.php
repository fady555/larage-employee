<?php

namespace App\Http\Controllers\Web\HR;

use App\ComapnyDepartment;
use App\Http\Controllers\Controller;
use App\Rules\Arabic;
use Illuminate\Http\Request;

class CompanyDepartmentController extends Controller
{

    public function index()
    {
        return view('hr.company_department')->with(['departments'=>ComapnyDepartment::where('status','A')->get()]);
    }

    public function attributes()
    {
        return [
            'depart_en' => trans('app.depart_en'),
            'depart_ar' => trans('app.depart_ar'),
            'description_en'=>trans('app.description_en'),
            'description_ar'=>trans('app.description_ar'),
        ];
    }

    public function rules()
    {
        return [
            'depart_en' =>['required','string','unique:comapny_departments,depart_en'],
            'depart_ar' =>['required','string',new Arabic(trans('app.name must arabic')),'unique:comapny_departments,depart_ar'],
            'description_en' =>['nullable','string'],
            'description_ar' =>['nullable','string',new Arabic(trans('app.name must arabic'))],
        ];
    }

    public function rulesEdit($idd)
    {
        return [
            'depart_en' =>['required','string','unique:comapny_departments,depart_en,'.$idd],
            'depart_ar' =>['required','string',new Arabic(trans('app.name must arabic')),'unique:comapny_departments,depart_ar,'.$idd],
            'description_en' =>['nullable','string'],
            'description_ar' =>['nullable','string',new Arabic(trans('app.name must arabic'))],
        ];
    }

    public function store(Request $request)
    {
        $result = validator($request->all(),$this->rules(),[],$this->attributes());

        if($result->fails()):
            return redirect()->back()->withErrors($result)->withInput();
        endif;

        ComapnyDepartment::create($request->except('_token'));
        session()->flash('message',trans('app.add_success'));

        return back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('hr.company_department')->with(['department'=>ComapnyDepartment::find($id),'departments'=>ComapnyDepartment::where('status','A')->get()]);
    }


    public function update(Request $request, $id)
    {
        $result = validator($request->all(),$this->rulesEdit($id),[],$this->attributes());

        if($result->fails()):
            return redirect()->back()->withErrors($result)->withInput();
        endif;

        ComapnyDepartment::find($id)->update($request->except('_token'));
        session()->flash('message',trans('app.edit_success'));

        return back();
    }


    public function destroy($id)
    {

        ComapnyDepartment::destroy($id);

        return true;

    }

}
