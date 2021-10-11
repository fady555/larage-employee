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
            ['name_en'=>'Not Specified','name_ar'=>'غير محدد'],
            ['name_en'=>'Single','name_ar'=>'عزباء/اعزب'],
            ['name_en'=>'Married','name_ar'=>'متزوج/متزوجه'],
            ['name_en'=>'Married with Children','name_ar'=>'متزوج و معه اطفال/متزوجه ومعها اطفال'],
            ['name_en'=>'Widowed','name_ar'=>'مخطوب/مخطوبه'],
            ['name_en'=>'Divorced','name_ar'=>'مطلق/مطلقه'],
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
