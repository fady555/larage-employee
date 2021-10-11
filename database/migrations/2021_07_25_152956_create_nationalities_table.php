<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CreateNationalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nationalities', function (Blueprint $table) {
            $table->id();

            $table->string('country_code');
            $table->string('country_enName');
            $table->string('country_arName');
            $table->string('country_enNationality');
            $table->string('country_arNationality');

            //$table->timestamps();
        });

        //(`country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`)

        $sql_nationality = File::get(public_path().'\database\nationality.sql');
        DB::connection()->getPdo()->exec($sql_nationality);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nationalities');
    }
}
