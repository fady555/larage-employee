<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventAndEffects extends Model
{
    protected $table = 'events_and_effects';

    protected $fillable = [
            'title_en',
            'title_ar',
            'description_en',
            'description_ar',
            'for_whom',
    ];
}
