<?php

namespace App\Http\Controllers\Web\HR;

use App\Http\Controllers\Controller;
use App\Rules\Arabic;
use App\TypeWork;
use Illuminate\Http\Request;

class TypeWorkController extends Controller
{

    public function index()
    {
        return view('hr.type_work')->with(['types_works'=>TypeWork::whereKeyNot(1)->get()]);
    }

    public function attributes()
    {
        return [
            'work_type_en'=> trans('app.work_type_en'),
            'work_type_ar' => trans('app.work_type_ar'),
            'description_en' => trans('app.description_en'),
            'description_ar' => trans('app.description_ar'),
        ];
    }

    public function rules()
    {
        return [
            'work_type_en'=>['required','string','unique:type_of_works,work_type_en'],
            'work_type_ar'=>['required','string',new Arabic(trans('app.name must arabic')),'unique:type_of_works,work_type_ar'],
            'description_en'=>['nullable','string'],
            'description_ar'=>['nullable','string',new Arabic(trans('app.name must arabic'))],
        ];
    }

    public function rulesEdit($idd)
    {
        return [
            'work_type_en'=>['required','string','unique:type_of_works,work_type_en,'.$idd],
            'work_type_ar'=>['required','string',new Arabic(trans('app.name must arabic')),'unique:type_of_works,work_type_ar,'.$idd],
            'description_en'=>['nullable','string'],
            'description_ar'=>['nullable','string',new Arabic(trans('app.name must arabic'))],
        ];
    }


    public function store(Request $request)
    {
        $result = validator($request->all(),$this->rules(),[],$this->attributes());

        if($result->fails()):
            return redirect()->back()->withErrors($result)->withInput();
        endif;

        TypeWork::create($request->except('_token'));
        session()->flash('message',trans('app.add_success'));

        return back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('hr.type_work')->with(['type_work'=>TypeWork::find($id),'types_works'=>TypeWork::whereKeyNot(1)->get()]);
    }

    public function update(Request $request, $id)
    {
        $result = validator($request->all(),$this->rulesEdit($id),[],$this->attributes());

        if($result->fails()):
            return redirect()->back()->withErrors($result)->withInput();
        endif;

        TypeWork::find($id)->update($request->except('_token'));
        session()->flash('message',trans('app.edit_success'));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TypeWork::destroy($id);

        return true;
    }
}
