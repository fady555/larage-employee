<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table='education_statuses';
    protected $fillable=[
        'education_status_ar',
        'education_status_en',
    ];

}
