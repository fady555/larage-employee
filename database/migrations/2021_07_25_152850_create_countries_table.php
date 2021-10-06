<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->integerIncrements('id')->unsigned();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('name_fr');
            $table->string('code');
            $table->timestamps();
        });

        $sql_dump = File::get(public_path().'\database\countries_sql_insert_table.sql');
        DB::connection()->getPdo()->exec($sql_dump);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
