<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name_company_en');
            $table->string('name_company_ar');
            $table->string('logo')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();

            //=============================================================
            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses')->onUpdate('cascade')->onDelete('cascade');
            //=============================================================
            $table->text('telphones')->nullable();
           /* $table->date('data_of_start_contracting');
            $table->date('data_of_expire_contracting');*/
            $table->timestamps();
        });

        DB::table('companies')->insert([
            [
                'name_company_en'=>'Al nor',
                'name_company_ar'=>' شركه النور',
                //'logo'=>'',
                'description_en'=>'A leading company in electric lights',
                'description_ar'=>'شركه رائده فى المصابيح الكهربيه',
                'address_id'=>5,
                'telphones'=>"06445454544",
                /*'data_of_start_contracting'=>'2021-8-9',
                'data_of_expire_contracting'=>'2021-9-9',*/
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
