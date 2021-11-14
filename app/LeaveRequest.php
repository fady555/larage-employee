<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    protected $table = 'leave_requests';
    protected $fillable = [
        
    ];





    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }

    public function status_dir(){
        return $this->belongsTo(StatusRequest::class,'status_request_dir_id','id');
    }
}
