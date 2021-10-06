<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateLevelExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('level_experience_ar');
            $table->string('level_experience_en');
            $table->timestamps();
        });
        DB::table('level_experiences')->insert([
            ['level_experience_ar'=>'Not Specified','level_experience_en'=>'غير محدد'],
            ['level_experience_ar'=>'طازج','level_experience_en'=>'fresh'],
            ['level_experience_ar'=>'متدرب','level_experience_en'=>'trainee'],
            ['level_experience_ar'=>'جونير','level_experience_en'=>'jounir'],
            ['level_experience_ar'=>'سينور','level_experience_en'=>'senior'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('level_experiences');
    }
}
