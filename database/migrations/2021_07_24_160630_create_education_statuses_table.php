<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateEducationStatusesTable extends Migration
{
    public function up()
    {
        Schema::create('education_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('education_status_ar');
            $table->string('education_status_en');
            $table->timestamps();
        });

        DB::table('education_statuses')->insert([
            ['education_status_ar'=>'غير محدد','education_status_en'=>'Not Specified'],
            ['education_status_ar'=>'طالب','education_status_en'=>'student'],
            ['education_status_ar'=>'حديث تخرج','education_status_en'=>'A fresh graduate'],
            ['education_status_ar'=>'ذو خبره','education_status_en'=>'Experienced'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('education_statuses');
    }
}
