<?php

namespace App\Observers;

use App\Employee;
use App\TypeWork;

class TypeWorkObserver
{

    public function deleting(TypeWork $type)
    {
        //
        $employees = Employee::where('type_work_id',$type->id);
        $employees->update(['type_work_id'=>1]);
    }


}
