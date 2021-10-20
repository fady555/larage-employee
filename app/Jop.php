<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jop extends Model
{
    protected $table = 'jops';
    protected $fillable = ['nik_name','name_en','name_ar'];
}
