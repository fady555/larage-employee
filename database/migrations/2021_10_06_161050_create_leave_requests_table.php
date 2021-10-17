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
            $table->foreign('employee_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status_requests')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });


        $fak_en = \Faker\Factory::create();
        $fak_ar = \Faker\Factory::create('ar_JO');


        /*DB::table('leave_requests')->insert([
            ['start'=>'2021-10-06','end'=>'2021-10-30','reason_description'=>'المدام حامل','employee_id'=>1,'status_id'=>1],
            ['start'=>'2021-10-06','end'=>'2021-10-30','reason_description'=>$fak_ar->title(),'employee_id'=>$fak_en->randomElement([1,2,3,4,5]),'status_id'=>$fak_en->randomElement([1,2,3])],
            ['start'=>'2021-10-06','end'=>'2021-10-30','reason_description'=>$fak_ar->title(),'employee_id'=>$fak_en->randomElement([1,2,3,4,5]),'status_id'=>$fak_en->randomElement([1,2,3])],
            ['start'=>'2021-10-06','end'=>'2021-10-30','reason_description'=>$fak_ar->title(),'employee_id'=>$fak_en->randomElement([1,2,3,4,5]),'status_id'=>$fak_en->randomElement([1,2,3])],
            ['start'=>'2021-10-06','end'=>'2021-10-30','reason_description'=>$fak_ar->title(),'employee_id'=>$fak_en->randomElement([1,2,3,4,5]),'status_id'=>$fak_en->randomElement([1,2,3])],
            ['start'=>'2021-10-06','end'=>'2021-10-30','reason_description'=>$fak_ar->title(),'employee_id'=>$fak_en->randomElement([1,2,3,4,5]),'status_id'=>$fak_en->randomElement([1,2,3])],
            ['start'=>'2021-10-06','end'=>'2021-10-30','reason_description'=>$fak_ar->title(),'employee_id'=>$fak_en->randomElement([1,2,3,4,5]),'status_id'=>$fak_en->randomElement([1,2,3])],
            ['start'=>'2021-10-06','end'=>'2021-10-30','reason_description'=>$fak_ar->title(),'employee_id'=>$fak_en->randomElement([1,2,3,4,5]),'status_id'=>$fak_en->randomElement([1,2,3])],
            ['start'=>'2021-10-06','end'=>'2021-10-30','reason_description'=>$fak_ar->title(),'employee_id'=>$fak_en->randomElement([1,2,3,4,5]),'status_id'=>$fak_en->randomElement([1,2,3])],
        ]);*/
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
