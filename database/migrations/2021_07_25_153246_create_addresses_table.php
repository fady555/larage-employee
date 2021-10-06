<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->longText('address_desc_en')->nullable();
            $table->longText('address_desc_ar')->nullable();
            $table->longText('address_desc_fr')->nullable();

            //===========================================================
            $table->unsignedInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries')->onUpdate('cascade')->onDelete('cascade');
            //============================================================
            $table->unsignedInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('cascade');

            //============================================================


            $table->timestamps();
        });

        $fak_en = \Faker\Factory::create();
        $fak_ar = \Faker\Factory::create('ar_JO');
        $fak_fr = \Faker\Factory::create('fr_FR');

        DB::table('addresses')->insert([
            ['address_desc_en'=>$fak_en->address,'address_desc_ar'=>$fak_ar->address,'address_desc_fr'=>$fak_fr->address,'country_id'=>59,'city_id'=>934],
            ['address_desc_en'=>$fak_en->address,'address_desc_ar'=>$fak_ar->address,'address_desc_fr'=>$fak_fr->address,'country_id'=>59,'city_id'=>934],
            ['address_desc_en'=>$fak_en->address,'address_desc_ar'=>$fak_ar->address,'address_desc_fr'=>$fak_fr->address,'country_id'=>59,'city_id'=>934],
            ['address_desc_en'=>$fak_en->address,'address_desc_ar'=>$fak_ar->address,'address_desc_fr'=>$fak_fr->address,'country_id'=>59,'city_id'=>934],
            ['address_desc_en'=>$fak_en->address,'address_desc_ar'=>$fak_ar->address,'address_desc_fr'=>$fak_fr->address,'country_id'=>59,'city_id'=>934],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addreses');
    }
}
