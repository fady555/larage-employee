<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComapnyDepartment extends Model
{
    protected $table = "comapny_departments";
    protected $fillable = [
        'depart_en',
        'depart_ar',
        'description_en',
        'description_ar',
        'status',
    ];
}
