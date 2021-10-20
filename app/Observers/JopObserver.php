<?php

namespace App\Observers;

use App\Employee;
use App\Jop;

class JopObserver
{

    public function deleting(Jop $jop)
    {
        //
        $employees = Employee::where('jop_id',$jop->id);
        $employees->update(['jop_id'=>1]);
    }


}
