<?php

namespace App\Observers;

use App\Education;
use App\Employee;

class EducationObserver
{
    public function deleting(Education $ed)
    {
        //
        $employees = Employee::where('education_status_id',$ed->id);
        $employees->update(['education_status_id'=>1]);
    }
}
