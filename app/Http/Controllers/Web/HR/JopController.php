<?php

namespace App\Http\Controllers\Web\HR;

use App\Http\Controllers\Controller;
use App\Jop;
use App\Rules\Arabic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JopController extends Controller
{

    public function index()
    {
        return view('hr.jop')->with(['jops'=>Jop::skip(4)->take(PHP_INT_MAX)->get()]);
    }

    public function attributes()
    {
        return [
            'nik_name'=> trans('app.acronym'),
            'name_en' => trans('app.The job is in English'),
            'name_ar' => trans('app.The job is in Arabic'),
        ];
    }

    public function rules()
    {
        return [
            'nik_name'=>['required','string','unique:jops,nik_name'],
            'name_en' =>['required','string','unique:jops,name_en'],
            'name_ar' =>['required','string',new Arabic(trans('app.name must arabic')),'unique:jops,name_ar'],
        ];
    }

    public function rulesEdit($idd)
    {
        return [
            'nik_name'=>['required','string','unique:jops,nik_name,'.$idd],
            'name_en' =>['required','string','unique:jops,name_en,'.$idd],
            'name_ar' =>['required','string',new Arabic(trans('app.name must arabic')),'unique:jops,name_ar,'.$idd],
        ];
    }

    public function store(Request $request)
    {



        $result = validator($request->all(),$this->rules(),[],$this->attributes());

        if($result->fails()):
            return redirect()->back()->withErrors($result)->withInput();
        endif;

        Jop::create($request->except('_token'));
        session()->flash('message',trans('app.add_success'));

        return back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('hr.jop')->with(['jop'=>Jop::find($id),'jops'=>Jop::skip(4)->take(PHP_INT_MAX)->get()]);
    }


    public function update(Request $request, $id)
    {

        $protect = [1,2,3,4];
        if(in_array($id,$protect)){
            return back();
        }
        $result = validator($request->all(),$this->rulesEdit($id),[],$this->attributes());

        if($result->fails()):
            return redirect()->back()->withErrors($result)->withInput();
        endif;

        Jop::find($id)->update($request->except('_token'));
        session()->flash('message',trans('app.edit_success'));

        return back();
    }


    public function destroy($id)
    {

        $protect = [1,2,3,4];
        if(in_array($id,$protect)){
            return true;
        }

        Jop::destroy($id);

        return true;

    }
}
