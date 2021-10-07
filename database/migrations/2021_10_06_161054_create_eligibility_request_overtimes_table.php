<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEligibilityRequestOvertimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eligibility_request_overtimes', function (Blueprint $table) {
            $table->id();

            $table->date('start');
            $table->date('end');
            $table->text('description');


            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status_requests')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('eligibility_request_overtimes');
    }
}
