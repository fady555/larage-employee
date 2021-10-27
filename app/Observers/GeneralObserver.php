<?php

namespace App\Observers;

use App\General;
use Illuminate\Support\Facades\Artisan;

class GeneralObserver
{
    public function created(General $general)
    {

         Artisan::call('send:general'." ".$general->id);

    }

    /*public function updated(General $general)
    {
        if($eventAndEffects->for_whom == 'FOR_COMPANY'):



            Artisan::call('send:event'." ".$eventAndEffects->id);



             endif;
    }*/
}
