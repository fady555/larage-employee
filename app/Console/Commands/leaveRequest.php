<?php

namespace App\Console\Commands;

use App\LeaveRequest as AppLeaveRequest;
use App\Notifications\LeaveRequestNotification;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;


class leaveRequest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //protected $signature = 'command:name';
    protected $signature = 'send:leaverequest {leave_request_id}';


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
       $leaveRequest = AppLeaveRequest::find($this->argument('leave_request_id'));
       $user  = User::find($leaveRequest->employee_id);

       Notification::send($user,new LeaveRequestNotification($leaveRequest));
    }
}
