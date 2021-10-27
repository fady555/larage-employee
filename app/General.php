<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{

    protected $table = 'generals';
    protected $fillable = [
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'for_whom',
    ];
}
