<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

class CreateGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generals', function (Blueprint $table) {
            $table->id();

            $table->string('title_en');
            $table->string('title_ar');
            $table->text('description_en');
            $table->text('description_ar');

            $table->longText('for_whom')->default(json_encode([]));

            $table->timestamps();
        });


        $fak_en = \Faker\Factory::create();
        $fak_ar = \Faker\Factory::create('ar_JO');

        DB::table('generals')->insert([
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'created_at'=>'2021-10-22 20:08:01'],
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'created_at'=>'2021-10-22 20:08:01'],
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'created_at'=>'2021-10-22 20:08:01'],
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'created_at'=>'2021-10-22 20:08:01'],
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'created_at'=>'2021-10-22 20:08:01'],
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'created_at'=>'2021-10-22 20:08:01'],
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'created_at'=>'2021-10-22 20:08:01'],
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'created_at'=>'2021-10-22 20:08:01'],
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'created_at'=>'2021-10-22 20:08:01'],
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'created_at'=>'2021-10-22 20:08:01'],
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'created_at'=>'2021-10-22 20:08:01'],
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'created_at'=>'2021-10-22 20:08:01'],
            ['title_en'=>$fak_en->title(),'title_ar'=>$fak_ar->title(),'description_en'=>$fak_en->text(),'description_ar'=>$fak_ar->text(),'created_at'=>'2021-10-22 20:08:01'],
        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generals');
    }
}
