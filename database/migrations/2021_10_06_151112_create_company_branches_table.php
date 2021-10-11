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

            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');



            $table->timestamps();
        });

        DB::table('company_branches')->insert([
            ['address_id'=>'3','company_id'=>'1','name_branch_en'=>'we','name_branch_ar'=>'يبيبي'],
            ['address_id'=>'8','company_id'=>'1','name_branch_en'=>'dfdfd','name_branch_ar'=>'بيب'],
            ['address_id'=>'9','company_id'=>'1','name_branch_en'=>'dfdf','name_branch_ar'=>'بيبي'],
            ['address_id'=>'6','company_id'=>'1','name_branch_en'=>'dfd','name_branch_ar'=>'بيب'],
            ['address_id'=>'2','company_id'=>'1','name_branch_en'=>'fee','name_branch_ar'=>'يبي'],
            ['address_id'=>'8','company_id'=>'1','name_branch_en'=>'yyyy','name_branch_ar'=>'يبي'],
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
