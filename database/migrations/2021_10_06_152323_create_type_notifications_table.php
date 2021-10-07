<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTypeNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('notifiy_en');
            $table->string('notifiy_ar');
            $table->timestamps();
        });

        DB::table('type_notifications')->insert([
            ['notifiy_en'=>'Identity Expiry','notifiy_ar'=>'انتهاء الهويه '],
            ['notifiy_en'=>'Passport Expiry','notifiy_ar'=>'انتهاء جواز الفر'],
            ['notifiy_en'=>'License Expiry','notifiy_ar'=>'انتهاء الرخصه'],
            ['notifiy_en'=>'Insurance Expiry','notifiy_ar'=>'انتهاء التأمين'],
            ['notifiy_en'=>'leve Expiry','notifiy_ar'=>'انتهاء الاجازه'],
            ['notifiy_en'=>'Contract Expiry','notifiy_ar'=>'انتهاءالعقد'],
            ['notifiy_en'=>'Late Entry','notifiy_ar'=>'دخول متاخر'],
            ['notifiy_en'=>'Early Entry','notifiy_ar'=>'خروج مبكرا'],
        ]);
    }

    /**
     * Reverse the migrations.خرو
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_notifications');
    }
}
