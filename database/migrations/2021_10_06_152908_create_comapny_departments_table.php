<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateComapnyDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comapny_departments', function (Blueprint $table) {
            $table->id();
            $table->string('depart_en');
            $table->string('depart_ar');
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->enum('status',['A','B'])->default('A');

            $table->timestamps();
        });


        DB::table('comapny_departments')->insert([
            ['depart_en'=>'Executive management','depart_ar'=>'الاداره التنفيذيه'],
            ['depart_en'=>'Public Administration','depart_ar'=>'الاداره العامه'],
            ['depart_en'=>'head Human Resource Management','depart_ar'=>' إدارة الموارد البشريةالرئسيه'],


            ['depart_en'=>'Sales Administration','depart_ar'=>'إدارة المبيعات'],
            ['depart_en'=>'Operations Management','depart_ar'=>'إدارة العمليات'],
            ['depart_en'=>'financial Management','depart_ar'=>'الإدارة المالية'],
            ['depart_en'=>'Human Resource Management','depart_ar'=>'إدارة الموارد البشرية'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comapny_departments');
    }
}
