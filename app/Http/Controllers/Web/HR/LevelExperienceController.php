<?php

namespace App\Http\Controllers\Web\HR;

use App\Experience;
use App\Http\Controllers\Controller;
use App\Rules\Arabic;
use Illuminate\Http\Request;

class LevelExperienceController extends Controller
{
    public function index()
    {
        return view('hr.level_experience')->with(['experiences'=>Experience::whereKeyNot(1)->get()]);
    }

    public function attributes()
    {
        return [
            'level_experience_en' => trans('app.level_experience_en'),
            'level_experience_ar' => trans('app.level_experience_ar'),
        ];
    }

    public function rules()
    {
        return [
            'level_experience_en' =>['required','string','unique:,level_experience_en'],
            'level_experience_ar' =>['required','string',new Arabic(trans('app.name must arabic')),'unique:level_experiences,level_experience_ar'],
        ];
    }

    public function rulesEdit($idd)
    {
        return [
            'level_experience_en' =>['required','string','unique:,level_experience_en,'.$idd],
            'level_experience_ar' =>['required','string',new Arabic(trans('app.name must arabic')),'unique:level_experiences,level_experience_ar,'.$idd],
        ];
    }

    public function store(Request $request)
    {
        $result = validator($request->all(),$this->rules(),[],$this->attributes());

        if($result->fails()):
            return redirect()->back()->withErrors($result)->withInput();
        endif;

        Experience::create($request->except('_token'));
        session()->flash('message',trans('app.add_success'));

        return back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('hr.level_experience')->with(['experience'=>Experience::find($id),'experiences'=>Experience::whereKeyNot(1)->get()]);
    }


    public function update(Request $request, $id)
    {
        $result = validator($request->all(),$this->rulesEdit($id),[],$this->attributes());

        if($result->fails()):
            return redirect()->back()->withErrors($result)->withInput();
        endif;

        Experience::find($id)->update($request->except('_token'));
        session()->flash('message',trans('app.edit_success'));

        return back();
    }


    public function destroy($id)
    {

        Experience::destroy($id);

        return true;

    }
}
