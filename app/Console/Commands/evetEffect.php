<?php

namespace App\Console\Commands;

use App\EventAndEffects;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class evetEffect extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:event {event_effect_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $data = EventAndEffects::select('id','title_en','title_ar','for_whom','created_at')->find($this->argument('event_effect_id'));



        //dd(var_dump(json_encode($data)));
            foreach(User::get() as $user):
                Notification::send($user,new \App\Notifications\EventEffectNotification($data));
            endforeach;
    }
}
