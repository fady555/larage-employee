<?php

namespace App\Http\Controllers\Web\HR;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){


        //return $request->input();



        $array = [];
        foreach($request->except(['name','genderCheeck']) as $key=>$value){
            if(!is_null($value)){
                $array[$key] = $value;
            }else{}
        }

        $searchTerm = $request->name;
        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $searchTerm = str_replace($reservedSymbols, ' ', $searchTerm);

        $searchValues = preg_split('/\s+/', $searchTerm, -1, PREG_SPLIT_NO_EMPTY);

        $res = Employee::with('user')->where(function ($q) use ($searchValues) {
            foreach ($searchValues as $value) {
                $q->orWhere('full_name_en', 'like', "%{$value}%");
                $q->orWhere('full_name_ar', 'like', "%{$value}%");
            }
        });


        $data = $res->where($array)->whereNotIn('id',[1,2,3])->whereHas('user',function($query){

            return $query->where('as', '!=', "HR");
        });

         if(empty($array)):
             $id_employee = $res->where($array)->whereNotIn('id',[1,2])->pluck('id')->toArray();  else: $id_employee= $array;  endif;

        $content = array(
            'success' => true,
            'id_employee'=>$id_employee,
            'data' => $data->get(['id','full_name_en','full_name_ar','avatar']),
            'message' => count($data->get()),
        );

        return response($content)->setStatusCode(200);



    }
}



