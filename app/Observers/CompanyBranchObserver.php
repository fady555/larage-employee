<?php

namespace App\Observers;

use App\CompanyBranch;
use App\Employee;

class CompanyBranchObserver
{
    public function deleting(CompanyBranch $branch)
    {
        //
        $employees = Employee::where('company_branch_id',$branch->id);

        if($employees):

            $id_delete = CompanyBranch::insertGetId([
                'name_branch_en'=>$branch->name_branch_en.'(deleted)',
                'name_branch_ar'=>$branch->name_branch_ar.'(تم حذفها)',
                'telphones'=>$branch->telphones,
                'address_id'=>$branch->address_id,
                'status'=>'B',
            ]);

            $employees->update(['company_branch_id'=>$id_delete]);

        endif;


    }
}
