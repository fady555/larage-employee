<?php

namespace App\Http\Controllers\Web\HR;

use App\Education;
use App\Http\Controllers\Controller;
use App\Rules\Arabic;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        return view('hr.education')->with(['educations'=>Education::whereKeyNot(1)->get()]);
    }

    public function attributes()
    {
        return [
            'education_status_en'=> trans('app.education_status_en'),
            'education_status_ar' => trans('app.education_status_ar'),
        ];
    }

    public function rules()
    {
        return [
            'education_status_en'=>['required','string','unique:education_statuses,education_status_en'],
            'education_status_ar' =>['required','string',new Arabic(trans('app.name must arabic')),'unique:education_statuses,education_status_ar'],
        ];
    }

    public function rulesEdit($idd)
    {
        return [
            'education_status_en'=>['required','string','unique:education_statuses,education_status_en,'.$idd],
            'education_status_ar' =>['required','string',new Arabic(trans('app.name must arabic')),'unique:education_statuses,education_status_ar,'.$idd],
        ];
    }

    public function store(Request $request)
    {
        $result = validator($request->all(),$this->rules(),[],$this->attributes());

        if($result->fails()):
            return redirect()->back()->withErrors($result)->withInput();
        endif;

        Education::create($request->except('_token'));
        session()->flash('message',trans('app.add_success'));

        return back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('hr.education')->with(['education'=>Education::find($id),'educations'=>Education::whereKeyNot(1)->get()]);
    }


    public function update(Request $request, $id)
    {
        $result = validator($request->all(),$this->rulesEdit($id),[],$this->attributes());

        if($result->fails()):
            return redirect()->back()->withErrors($result)->withInput();
        endif;

        Education::find($id)->update($request->except('_token'));
        session()->flash('message',trans('app.edit_success'));

        return back();
    }


    public function destroy($id)
    {

        Education::destroy($id);

        return true;

    }
}
