<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateJopsTable extends Migration
{

    public function up()
    {
        Schema::create('jops', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable()->default('NULL');
            $table->string('name_ar')->nullable()->default('NULL');
            $table->string('nik_name');
            $table->timestamps();
        });

        DB::table('jops')->insert([
            ['name_en'=>"Not Specified",'name_ar'=>"غير محدد",'nik_name'=>"null"],
            ['name_en'=>"chief executive officer",'name_ar'=>"الرئيس التنفيذى",'nik_name'=>"CEO"],
            ['name_en'=>"General Director",'name_ar'=>"المدير العام",'nik_name'=>"GD"],
            ['name_en'=>"Manger Director Human Resource",'name_ar'=>" مدير المباشر الموارد البشريه ",'nik_name'=>"Head HR"],

            ['name_en'=>"Human Resource",'name_ar'=>"الموارد البشريه",'nik_name'=>"HR"],
            ['name_en'=>"law affires",'name_ar'=>"شئون قانونيه",'nik_name'=>"law"],
            ['name_en'=>"back end developer",'name_ar'=>"مطور الواجهه الخلفيه",'nik_name'=>"BK-end"],
            ['name_en'=>"front end developer",'name_ar'=>"مطور الواجهه الاماميه",'nik_name'=>"FR-end"],
            ['name_en'=>"android developer",'name_ar'=>"مطور اندرويد",'nik_name'=>"And-dev"],

        ]);

    }

    public function down()
    {
        Schema::dropIfExists('jops');
    }
}
