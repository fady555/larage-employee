<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTableEventsAndEffects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_and_effects', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ar');
            $table->text('description_en');
            $table->text('description_ar');
            $table->enum('for_whom',['FOR_HR','FOR_COMPANY']);
            $table->timestamps();
        });


        $fak_en = \Faker\Factory::create();
        $fak_ar = \Faker\Factory::create('ar_SA');


        DB::table('events_and_effects')->insert([
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY']),'created_at'=>'2021-10-22 20:08:01'],
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY']),'created_at'=>'2021-10-22 20:08:01'],
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY']),'created_at'=>'2021-10-22 20:08:01'],
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY']),'created_at'=>'2021-10-22 20:08:01'],
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY']),'created_at'=>'2021-10-22 20:08:01'],
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY']),'created_at'=>'2021-10-22 20:08:01'],
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY']),'created_at'=>'2021-10-22 20:08:01'],
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY']),'created_at'=>'2021-10-22 20:08:01'],
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY']),'created_at'=>'2021-10-22 20:08:01'],
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY']),'created_at'=>'2021-10-22 20:08:01'],
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY']),'created_at'=>'2021-10-22 20:08:01'],
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY']),'created_at'=>'2021-10-22 20:08:01'],
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'for_whom'=>$fak_en->randomElement(['FOR_HR','FOR_COMPANY']),'created_at'=>'2021-10-22 20:08:01'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_events_and_effects');
    }
}
