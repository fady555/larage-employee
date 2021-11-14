<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateLeaveRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();
            $table->date('start');
            $table->date('end');
            $table->text('reason_description')->nullable();

            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('status_request_hr_id')->default(1);
            $table->foreign('status_request_hr_id')->references('id')->on('status_requests')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('status_request_dir_id')->default(1);
            $table->foreign('status_request_dir_id')->references('id')->on('status_requests')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leave_requests');
    }
}
