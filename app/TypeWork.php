<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeWork extends Model
{
    protected $table = 'type_of_works';

    protected $fillable = [
        'work_type_en',
        'work_type_ar',
        'description_en',
        'description_ar',
    ];

}
