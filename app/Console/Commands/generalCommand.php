<?php

namespace App\Console\Commands;

use App\General;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

use function GuzzleHttp\json_decode;

class generalCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:general {general_id}';

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

        $data= General::select('id','title_en','title_ar','for_whom','created_at')->find($this->argument('general_id'));


        foreach(User::whereIn('id',json_decode($data->for_whom))->get() as $user):
            Notification::send($user,new \App\Notifications\GeneralNotification($data));
        endforeach;


    }
}
