<?php

namespace App\Observers;

use App\Address;
use App\Employee;

class EmployeeObserver
{

    public function deleting(Employee $employee)
    {
        Address::where('id',$employee->address_id)->delete();
    }

}
