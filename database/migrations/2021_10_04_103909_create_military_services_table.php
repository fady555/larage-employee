<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateMilitaryServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('military_services', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ar');
            $table->timestamps();
        });

        DB::table('military_services')->insert([
            ['name_en'=>'Not Specified','name_ar'=>'غير محدد'],
            ['name_en'=>'postponed from military service','name_ar'=>'مؤجل من الخدمه العسكريه'],
            ['name_en'=>'exempt from the military service','name_ar'=>'معفى من الخدمه العسكريه'],
            ['name_en'=>'another','name_ar'=>'اخرى'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('military_services');
    }
}
