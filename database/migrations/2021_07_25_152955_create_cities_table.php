<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('name_fr');
            $table->string('code');
            $table->integer('country_id')->unsigned();
            $table->timestamps();
        });

        //$sql_dump = File::get(public_path().'\database\cities_sql_insert_table.sql');
        $sql_dump_2 = File::get(public_path().'\database\cities.sql');
        DB::connection()->getPdo()->exec($sql_dump_2);



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
