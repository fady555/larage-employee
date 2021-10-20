<?php

namespace App\Observers;

use App\Degree;
use App\Employee;

class DegreeObserver
{
    public function deleting(Degree $degree)
    {
        //
        $employees = Employee::where('degree_id',$degree->id);
        $employees->update(['degree_id'=>1]);
    }
}
