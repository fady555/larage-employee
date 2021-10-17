<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });


        $fak_en = \Faker\Factory::create();
        $fak_ar = \Faker\Factory::create('ar_JO');

        DB::table('reports')->insert([
            ['title'=>$fak_en->title(),'description'=>$fak_en->text()],
            ['title'=>$fak_en->title(),'description'=>$fak_en->text()],
            ['title'=>$fak_en->title(),'description'=>$fak_en->text()],
            ['title'=>$fak_en->title(),'description'=>$fak_en->text()],
            ['title'=>$fak_en->title(),'description'=>$fak_en->text()],
            ['title'=>$fak_en->title(),'description'=>$fak_en->text()],
            ['title'=>$fak_en->title(),'description'=>$fak_en->text()],
            ['title'=>$fak_en->title(),'description'=>$fak_en->text()],
        ]);



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
