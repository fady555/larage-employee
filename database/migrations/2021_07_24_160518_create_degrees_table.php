<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDegreesTable extends Migration
{

    public function up()
    {
        Schema::create('degrees', function (Blueprint $table) {
            $table->id();
            $table->string('degree_en')->nullable();
            $table->string('degree_ar')->nullable();
            $table->timestamps();
        });

        DB::table('degrees')->insert([
            ['degree_en'=>"Not Specified" ,'degree_ar'=>"غير محدد",],
            ['degree_en'=>"Bachelor of Laws" ,'degree_ar'=>"بكالوريوس في القانون"],
            ['degree_en'=>"Bachelor of Commerce" ,'degree_ar'=>"بكالوريوس تجاره"],
            ['degree_en'=>"Bachelor of computer science" ,'degree_ar'=>"بكالوريوس حاسبات معومات"],
        ]);
    }


    public function down()
    {
        Schema::dropIfExists('degrees');
    }
}
