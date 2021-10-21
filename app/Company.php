<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $fillable = [
        'name_company_en',
        'name_company_ar',
        'logo',
        'description_en',
        'description_ar',
        'address_id',
        'telphones',
    ];

    public function address(){
        return $this->belongsTo(Address::class);
    }
}
