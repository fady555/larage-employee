<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description_en');
            $table->text('description_ar');
            $table->enum('for_whom',['FOR_HR','FOR_COMPANY']);
            $table->timestamps();
        });


        $fak_en = \Faker\Factory::create();
        $fak_ar = \Faker\Factory::create('ar_JO');


        DB::table('events')->insert([
            ['title'=>$fak_en->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY'])],
            ['title'=>$fak_en->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY'])],
            ['title'=>$fak_en->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY'])],
            ['title'=>$fak_en->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY'])],
            ['title'=>$fak_en->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY'])],
            ['title'=>$fak_en->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY'])],
            ['title'=>$fak_en->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY'])],
            ['title'=>$fak_en->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY'])],
            ['title'=>$fak_en->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY'])],
            ['title'=>$fak_en->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY'])],
            ['title'=>$fak_en->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY'])],
            ['title'=>$fak_en->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY'])],
            ['title'=>$fak_en->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY'])],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
