<?php

namespace App\Http\Controllers\Web\HR;

use App\EventAndEffects;
use App\Http\Controllers\Controller;
use App\Rules\Arabic;
use Illuminate\Http\Request;

class EventAndEffectController extends Controller
{
    public function index($forWhom = null)
    {

        if($forWhom == 'hr'):
            $event_effects = EventAndEffects::where('for_whom','FOR_HR')->get();
        elseif($forWhom == 'company'):
            $event_effects = EventAndEffects::where('for_whom','FOR_COMPANY')->get();
        else:
            $event_effects = EventAndEffects::get();
        endif;


        return view('hr.eventAndEffect')->with(['event_effects'=>$event_effects]);
    }

    public function attributes()
    {
        return [
            'title_en' => trans('app.title event en'),
            'title_ar' => trans('app.title event ar'),
            'description_en' => trans('app.description_en'),
            'description_ar' => trans('app.description_ar'),
            'for_whom' => trans('app.for_whom'),
        ];
    }

    public function rules()
    {
        return [
            'title_en'=>['required','string'],
            'title_ar'=>['required','string',new Arabic(trans('app.name must arabic'))],
            'description_en' =>['required','string'],
            'description_ar' =>['required','string',new Arabic(trans('app.name must arabic')),],
            'for_whom' =>['required','string','in:FOR_HR,FOR_COMPANY'],
        ];
    }



    public function store(Request $request)
    {
        $result = validator($request->all(),$this->rules(),[],$this->attributes());

        if($result->fails()):
            return redirect()->back()->withErrors($result)->withInput();
        endif;

        EventAndEffects::create($request->except('_token','fromWhomCheeck'));
        session()->flash('message',trans('app.add_success'));

        return back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id,$forWhom=null)
    {

        if($forWhom == 'hr'):
            $event_effects = EventAndEffects::where('for_whom','FOR_HR')->get();
        elseif($forWhom == 'company'):
            $event_effects = EventAndEffects::where('for_whom','FOR_COMPANY')->get();
        else:
            $event_effects = EventAndEffects::get();
        endif;

        return view('hr.eventAndEffect')->with(['event_effect'=>EventAndEffects::find($id),'event_effects'=>$event_effects]);
    }


    public function update(Request $request, $id)
    {

        //dd($request->all());

        $result = validator($request->all(),$this->rules(),[],$this->attributes());

        if($result->fails()):
            return redirect()->back()->withErrors($result)->withInput();
        endif;

        EventAndEffects::find($id)->update($request->except('_token','fromWhomCheeck'));
        session()->flash('message',trans('app.edit_success'));

        return back();
    }


    public function destroy($id)
    {

        /*EventAndEffects::destroy($id);

        return true;*/

        if($id == '*'):
            EventAndEffects::truncate();
        else:
            EventAndEffects::destroy($id);
        endif;

        return true;

    }
}
