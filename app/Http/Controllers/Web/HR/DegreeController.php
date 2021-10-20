<?php

namespace App\Http\Controllers\web\hr;

use App\Degree;
use App\Http\Controllers\Controller;
use App\Rules\Arabic;
use Illuminate\Http\Request;

class DegreeController extends Controller
{
    public function index()
    {
       return view('hr.degree')->with(['degrees'=>Degree::whereKeyNot(1)->get()]);
    }

    public function attributes()
    {
        return [
            'degree_en' => trans('app.degree_en'),
            'degree_ar' => trans('app.degree_ar'),
        ];
    }

    public function rules()
    {
        return [
            'degree_en' =>['required','string','unique:degrees,degree_en'],
            'degree_ar' =>['required','string',new Arabic(trans('app.name must arabic')),'unique:degrees,degree_ar'],
        ];
    }

    public function rulesEdit($idd)
    {
        return [
            'degree_en' =>['required','string','unique:degrees,degree_en,'.$idd],
            'degree_ar' =>['required','string',new Arabic(trans('app.name must arabic')),'unique:degrees,degree_ar,'.$idd],
        ];
    }

    public function store(Request $request)
    {

        $result = validator($request->all(),$this->rules(),[],$this->attributes());

        if($result->fails()):
            return redirect()->back()->withErrors($result)->withInput();
        endif;

        Degree::create($request->except('_token'));
        session()->flash('message',trans('app.add_success'));

        return back();

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('hr.degree')->with(['degree'=>Degree::find($id),'degrees'=>Degree::whereKeyNot(1)->get()]);

    }


    public function update(Request $request, $id)
    {
        $result = validator($request->all(),$this->rulesEdit($id),[],$this->attributes());

        if($result->fails()):
            return redirect()->back()->withErrors($result)->withInput();
        endif;

        Degree::find($id)->update($request->except('_token'));
        session()->flash('message',trans('app.edit_success'));

        return back();
    }


    public function destroy($id)
    {

        Degree::destroy($id);

        return true;

    }
}
