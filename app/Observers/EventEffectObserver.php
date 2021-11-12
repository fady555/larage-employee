<?php

namespace App\Observers;

use App\EventAndEffects;
use App\Notifications;
use App\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class EventEffectObserver
{


    public function created(EventAndEffects $eventAndEffects)
    {




       Artisan::call('send:event'." ".$eventAndEffects->id);


    }

    public function updated(EventAndEffects $eventAndEffects)
    {
        if($eventAndEffects->for_whom == 'FOR_COMPANY'):



            Artisan::call('send:event'." ".$eventAndEffects->id);



             endif;
    }


    public function deleted(EventAndEffects $eventAndEffects){



    }



}
