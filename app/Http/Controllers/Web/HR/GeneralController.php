<?php

namespace App\Http\Controllers\Web\HR;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\General;
use App\Rules\Arabic;
use App\User;

class GeneralController extends Controller
{

    public function index()
    {
        return view('hr.general')->with(['generals'=>General::get()]);
    }


    public function attributes()
    {
        return [
            'title_en' => trans('app.title event en'),
            'title_ar' => trans('app.title event ar'),
            'description_en' => trans('app.description_en'),
            'description_ar' => trans('app.description_ar'),
        ];
    }

    public function rules()
    {
        return [
            'title_en'=>['required','string'],
            'title_ar'=>['required','string',new Arabic(trans('app.name must arabic'))],
            'description_en' =>['required','string'],
            'description_ar' =>['required','string',new Arabic(trans('app.name must arabic')),],
        ];
    }


    private function users($employees){

        $users = [];
        for($i=0; $i<count($employees);$i++ ){
            array_push($users,$employees[$i]['user']['id']);
        }

        return $users;

    }


    public function store(Request $request)
    {


        $result = validator($request->all(),$this->rules(),[],$this->attributes());

        if($result->fails()):
            return redirect()->back()->withErrors($result)->withInput();
        endif;

        //===========================================
        $reQuestAdd = $request->except(['_token']);


        if(isset($request->branches)):$reQuestAdd['branches']=  $request->branches;  else: $reQuestAdd['branches'] = [];  endif;

        if(isset($request->departments)):$reQuestAdd['departments']=  $request->departments;  else: $reQuestAdd['departments'] = [];  endif;



        $employees = Employee::with('user')->whereIn('company_branch_id',$reQuestAdd['branches'])->whereIn('comapny_departments_id',$reQuestAdd['departments'])->select('id')->get();




        // $this->users($employees);

        $reQuestAdd['for_whom'] = json_encode($this->users($employees));


        General::create($reQuestAdd);

        session()->flash('message',trans('app.add_success'));

        return back();
    }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
