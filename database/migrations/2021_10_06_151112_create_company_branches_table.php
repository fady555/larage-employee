<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCompanyBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_branches', function (Blueprint $table) {
            $table->id();

            $table->string('name_branch_en');
            $table->string('name_branch_ar');

            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade')->onUpdate('cascade');

            $table->text('telphones')->nullable();

            $table->enum('status',['A','B'])->default('A');



            $table->timestamps();
        });

        DB::table('company_branches')->insert([
            ['address_id'=>'3','name_branch_en'=>'Head Office','name_branch_ar'=>'الفرع الرئيسى'],
            ['address_id'=>'8','name_branch_en'=>'bb','name_branch_ar'=>'bb'],
            ['address_id'=>'9','name_branch_en'=>'cc','name_branch_ar'=>'cc'],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_branches');
    }
}
