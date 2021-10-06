<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateTypeOfWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('type_of_works', function (Blueprint $table) {
            $table->id();
            $table->string('work_type_en');
            $table->string('work_type_ar');
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->timestamps();
        });

        DB::table('type_of_works')->insert([
            ['work_type_en'=>'Not Specified','work_type_ar'=>'غير محدد'],
            ['work_type_en'=>'Full Time','work_type_ar'=>'دوام كامل'],
            ['work_type_en'=>'Part Time','work_type_ar'=>'دوام جزئى'],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_of_works');
    }
}
