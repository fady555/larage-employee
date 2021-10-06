<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $fillable=[
        'id',
        'address_desc_en',
        'address_desc_ar',
        'country_id',
        'city_id',
    ];


    public function country(){
        return $this->belongsTo('App\Country','country_id','id');
    }

    public function city(){
        return $this->belongsTo('App\City','city_id','id');
    }
}
