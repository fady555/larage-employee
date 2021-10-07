<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSancationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sancations', function (Blueprint $table) {
            $table->id();

            $table->double('amoumt');

            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');

            $table->text('reasons');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sancations');
    }
}
