<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyBranch extends Model
{
    protected $table = "company_branches";

    protected $fillable = [
        'name_branch_en',
        'name_branch_ar',
        'address_id',
        'telphones',
    ];

    public function address(){
        return $this->belongsTo(Address::class);
    }
}
