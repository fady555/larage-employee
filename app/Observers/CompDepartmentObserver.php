<?php

namespace App\Observers;

use App\ComapnyDepartment;
use App\Employee;

class CompDepartmentObserver
{
    public function deleting(ComapnyDepartment $dpartment)
    {
        //
        $employees = Employee::where('comapny_departments_id',$dpartment->id);

        if($employees):

            $id_delete = ComapnyDepartment::insertGetId([
                'depart_en'=>$dpartment->depart_en.'(deleted)',
                'depart_ar'=>$dpartment->depart_ar.'(تم حذفها)',
                'status'=>'B',
            ]);

            $employees->update(['comapny_departments_id'=>$id_delete]);

        endif;





    }
}
