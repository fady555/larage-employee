<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateJopLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jop_levels', function (Blueprint $table) {
            $table->id();
            $table->string('level_en');
            $table->string('level_ar');
            $table->tinyInteger('number');
            $table->timestamps();
        });


        DB::table('jop_levels')->insert([
            ['level_en'=>'Head (excutive) manger','level_ar'=>'المدير التنفيذى','number'=>'1'],
            ['level_en'=>'General manger','level_ar'=>'المدير العام','number'=>'2'],
            ['level_en'=>'Manger Direct','level_ar'=>'المدير المباشر','number'=>'3'],
            ['level_en'=>'Employee','level_ar'=>'موظف','number'=>'4'],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jop_levels');
    }
}
