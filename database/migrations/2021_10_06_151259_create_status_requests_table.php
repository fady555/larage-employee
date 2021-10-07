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
            ['status_en'=>'Underway','status_ar'=>'قيد التنفيذ'],
            ['status_en'=>'Approved ','status_ar'=>'تم الموافقه عليه'],
            ['status_en'=>'Reject','status_ar'=>'تم رفضه'],
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
