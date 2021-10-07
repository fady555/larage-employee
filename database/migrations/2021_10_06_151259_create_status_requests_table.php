<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateStatusRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_requests', function (Blueprint $table) {
            $table->id();
            $table->string('status_en');
            $table->string('status_ar');
            $table->timestamps();
        });

        DB::table('status_requests')->insert([
            ['name_en'=>'Underway','name_ar'=>'قيد التنفيذ'],
            ['name_en'=>'Approved ','name_ar'=>'تم الموافقه عليه'],
            ['name_en'=>'Reject','name_ar'=>'تم رفضه'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_requests');
    }
}
