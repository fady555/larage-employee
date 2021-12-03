<?php

namespace App\Observers;

use App\LeaveRequest;
use Illuminate\Support\Facades\Artisan;

class LeaveRquestObserver
{
    /**
     * Handle the leave request "created" event.
     *
     * @param  \App\LeaveRequest  $leaveRequest
     * @return void
     */
    public function created(LeaveRequest $leaveRequest)
    {
        //
    }

    /**
     * Handle the leave request "updated" event.
     *
     * @param  \App\LeaveRequest  $leaveRequest
     * @return void
     */
    public function updated(LeaveRequest $leaveRequest)
    {
        if($leaveRequest->status_request_hr_id >=2 or $leaveRequest->status_request_dir_id >=2){

            Artisan::call('send:leaverequest'." ".$leaveRequest->id);
        }
    }

    /**
     * Handle the leave request "deleted" event.
     *
     * @param  \App\LeaveRequest  $leaveRequest
     * @return void
     */
    public function deleted(LeaveRequest $leaveRequest)
    {
        //
    }

    /**
     * Handle the leave request "restored" event.
     *
     * @param  \App\LeaveRequest  $leaveRequest
     * @return void
     */
    public function restored(LeaveRequest $leaveRequest)
    {
        //
    }

    /**
     * Handle the leave request "force deleted" event.
     *
     * @param  \App\LeaveRequest  $leaveRequest
     * @return void
     */
    public function forceDeleted(LeaveRequest $leaveRequest)
    {
        //
    }
}
