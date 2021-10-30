<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();

            $table->string('name_en');
            $table->string('name_ar');
            $table->enum('cheek',['0','1']);

            $table->timestamps();
        });

        DB::table('permissions')->insert([

            //jop
            ['name_en'=>'Show jops','name_ar'=>'اظهار الوظائف','cheek'=>'1'],
            ['name_en'=>'Add jop','name_ar'=>'اضافه وظيفه','cheek'=>'0'],
            ['name_en'=>'edit jop','name_ar'=>'التعديل على وظيفه','cheek'=>'0'],
            ['name_en'=>'Delete jop','name_ar'=>'حذف وظيفه','cheek'=>'0'],

            //degreee
            ['name_en'=>'Show degrees','name_ar'=>'اظهار الدرجات العلميه','cheek'=>'1'],
            ['name_en'=>'Add degree','name_ar'=>'اضافه الدرجات العلمي','cheek'=>'0'],
            ['name_en'=>'edit degree','name_ar'=>'التعديل على الدرجات العلميه','cheek'=>'0'],
            ['name_en'=>'Delete degree','name_ar'=>'حذف الدرجات العلميه','cheek'=>'0'],

            //education status
            ['name_en'=>'Show educations status','name_ar'=>'اظهار الحالات التعلميه','cheek'=>'1'],
            ['name_en'=>'Add education status','name_ar'=>'اضافه الحاله التعلميه','cheek'=>'0'],
            ['name_en'=>'edit education status','name_ar'=>'التعديل على الحاله التعلميه','cheek'=>'0'],
            ['name_en'=>'Delete education status','name_ar'=>'حذف الحاله التعلميه','cheek'=>'0'],

            //level experence

            ['name_en'=>'Show levels experience','name_ar'=>'اظهار الحال التعلميه','cheek'=>'1'],
            ['name_en'=>'Add level experience','name_ar'=>'اضافه الحاله التعلميه','cheek'=>'0'],
            ['name_en'=>'edit level experience','name_ar'=>'التعديل على الحاله التعلميه','cheek'=>'0'],
            ['name_en'=>'Delete level experience','name_ar'=>'حذف الحاله التعلميه','cheek'=>'0'],

            //type of work
            ['name_en'=>'Show jops','name_ar'=>'اظهار نوع العمل','cheek'=>'1'],
            ['name_en'=>'Add type of work','name_ar'=>'اضافه نوع العمل','cheek'=>'0'],
            ['name_en'=>'edit type of work','name_ar'=>'التعديل على نوع العمل','cheek'=>'0'],
            ['name_en'=>'Delete type of work','name_ar'=>'حذف نوع العمل','cheek'=>'0'],

            //contract
            ['name_en'=>'Show contracts','name_ar'=>'اظهار عقود العمل','cheek'=>'1'],
            ['name_en'=>'Add contract','name_ar'=>'اضافه عقد عمل','cheek'=>'0'],
            ['name_en'=>'edit contract','name_ar'=>'التعديل على عقد العمل','cheek'=>'0'],
            ['name_en'=>'Delete contract','name_ar'=>'حذف عقد العمل','cheek'=>'0'],



//



        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
