<?php

namespace App\Observers;

use App\Employee;
use App\Experience;

class ExperienceObserver
{
    public function deleting(Experience $ex)
    {
        //
        $employees = Employee::where('level_experience_id',$ex->id);
        $employees->update(['level_experience_id'=>1]);
    }
}
