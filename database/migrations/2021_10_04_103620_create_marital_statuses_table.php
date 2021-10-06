<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateMaritalStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marital_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ar');
            $table->timestamps();
        });

        DB::table('marital_statuses')->insert([
            ['name_en'=>'Not Specified','name_ar'=>''],
            ['name_en'=>'Single','name_ar'=>''],
            ['name_en'=>'Married','name_ar'=>''],
            ['name_en'=>'Married with Children','name_ar'=>''],
            ['name_en'=>'Widowed','name_ar'=>''],
            ['name_en'=>'Divorced','name_ar'=>''],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marital_statuses');
    }
}
