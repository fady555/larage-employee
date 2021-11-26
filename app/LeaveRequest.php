<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    protected $table = 'leave_requests';
    protected $fillable = [
        'start',
        'end',
        'reason_description',
        'employee_id',
        'status_request_hr_id',
        'status_request_dir_id',
    ];





    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }

    public function status_dir(){
        return $this->belongsTo(StatusRequest::class,'status_request_dir_id','id');
    }
}
