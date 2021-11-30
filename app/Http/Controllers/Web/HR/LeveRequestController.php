<?php

namespace App\Http\Controllers\web\hr;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Web\HR\SearchController;
use App\LeaveRequest;

use function GuzzleHttp\json_encode;

class LeveRequestController extends Controller
{
    public $branch;
    public function index($branch_id = null){

        $this->branch = $branch_id;

        if(is_null($branch_id)):
            return view('hr.level_request')->with(['level_requests'=>LeaveRequest::with('employee')->get()]);
        endif;

        $leveRequest = LeaveRequest::whereHas('employee',function($query){

            $query->where('company_branch_id',$this->branch);
        })->get();

        return view('hr.level_request')->with(['level_requests'=>$leveRequest]);






    }

    public function getAjaxRequest(Request $request){
        $search = new SearchController();
        $employee_id = (json_decode( $search->search($request)->content(),true))['id_employee'];


        //return $employee_id;

         $leveRequest =  LeaveRequest::with('employee')->whereIn('employee_id',$employee_id)->get();
         //$leveRequest = Employee::get();

         return json_encode($leveRequest);
    }

    public function assign($id,$status){

       $result =  LeaveRequest::find($id)->update(['status_request_hr_id'=>$status]);

       return $result;
    }


    public function destroy($id)
    {

       LeaveRequest::destroy($id);

        return true;

    }
}
