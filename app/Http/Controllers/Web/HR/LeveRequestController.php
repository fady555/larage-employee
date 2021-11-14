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
    public function index(){


        return view('hr.level_request')->with(['level_requests'=>LeaveRequest::with('employee')->get()]);


    }

    public function getAjaxRequest(Request $request){
        $search = new SearchController();
        $employee_id = (json_decode( $search->search($request)->content(),true))['id_employee'];


        //return $employee_id;

         $leveRequest =  LeaveRequest::with('employee')->whereIn('employee_id',$employee_id)->get();
         //$leveRequest = Employee::get();

         return json_encode($leveRequest);
    }

    public function assign(){

    }

    public function destroy($id)
    {

       LeaveRequest::destroy($id);

        return true;

    }
}
