<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {

            $table->id();
            $table->string('full_name_ar');
            $table->string('full_name_en');
            $table->integer('age');
            $table->enum('gender', ['F', 'M']);
            $table->string('avatar')->nullable();
            $table->date('data_of_start_work')->nullable();

            $table->integer('number_of_leave')->default(0);

            $table->string('number_file')->nullable();

            $table->string('national_id');
            $table->text('national_card_img')->nullable();
            $table->text('national_card_address_description')->nullable();
            $table->date('national_card_Release_date');


            $table->string('passport_id')->nullable();
            $table->text('passport_address_description')->nullable();
            $table->date('passport_release_date')->nullable();
            $table->date('passport_expire_date')->nullable();



            $table->string('email')->unique();
            $table->string('phone');
            $table->string('name_of_bank')->nullable();
            $table->string('number_of_account')->nullable();

            $table->tinyInteger('number_of_wif_husband')->nullable();
            $table->tinyInteger('number_of_wif_children')->nullable();

            $table->time('time_of_attendees');
            $table->time('time_of_go');

            $table->double('fixed_salary')->default(0);

            $table->longText('experience_description');

            //=============================================================
            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses')->onUpdate('cascade')->onDelete('cascade');
            //=============================================================
            $table->unsignedBigInteger('nationality_id');
            $table->foreign('nationality_id')->references('id')->on('nationalities');
            //=============================================================


            $table->unsignedBigInteger('jop_id')->nullable();
            $table->foreign('jop_id')->references('id')->on('jops')->onUpdate('cascade')->onDelete('cascade');
            //=============================================================
            $table->unsignedBigInteger('jop_level_id');
            $table->foreign('jop_level_id')->references('id')->on('jop_levels')->onUpdate('cascade')->onDelete('cascade');
            //=============================================================

            //=============================================================
            $table->unsignedBigInteger('type_work_id')->nullable()->default(1);
            $table->foreign('type_work_id')->references('id')->on('type_of_works')->onUpdate('cascade')->onDelete('cascade');
            //=============================================================



            $table->unsignedBigInteger('degree_id');
            $table->foreign('degree_id')->references('id')->on('degrees')->onUpdate('cascade')->onDelete('cascade');
            //=============================================================
            $table->unsignedBigInteger('education_status_id');
            $table->foreign('education_status_id')->references('id')->on('education_statuses')->onUpdate('cascade')->onDelete('cascade');
            //=============================================================
            $table->unsignedBigInteger('level_experience_id');
            $table->foreign('level_experience_id')->references('id')->on('level_experiences')->onUpdate('cascade')->onDelete('cascade');
            //=============================================================


            //=============================================================
            $table->unsignedBigInteger('employee_status_id')->default(2);
            $table->foreign('employee_status_id')->references('id')->on('employee_statuses')->onUpdate('cascade')->onDelete('cascade');
            //=============================================================



            //=============================================================
            $table->unsignedBigInteger('comapny_departments_id');
            $table->foreign('comapny_departments_id')->references('id')->on('comapny_departments')->onUpdate('cascade')->onDelete('cascade');
            //=============================================================
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies');
            //=============================================================
            $table->unsignedBigInteger('direct_employee_id')->nullable();
            $table->foreign('direct_employee_id')->references('id')->on('employees');
            //=============================================================

            $table->unsignedBigInteger('company_branch_id');
            $table->foreign('company_branch_id')->references('id')->on('company_branches');
            //=============================================================

            //=============================================================
            $table->unsignedBigInteger('marital_statuses_id');
            $table->foreign('marital_statuses_id')->references('id')->on('marital_statuses');
            //=============================================================

            //=============================================================
            $table->unsignedBigInteger('military_services_id');
            $table->foreign('military_services_id')->references('id')->on('military_services');
            //=============================================================



            $table->timestamps();
        });


        $fak_en = \Faker\Factory::create();
        $fak_ar = \Faker\Factory::create('ar_JO');




        DB::table('employees')->insert([
            [
                'full_name_en'=>'chief executive officer (un define)',
                'full_name_ar'=>'الرئيس التنفيذى (غير محدد)',
                'age'=>0,
                'gender'=>'M',
                'avatar'=>null,
                'data_of_start_work'=>'2000-1-1',
                'national_id'=>'12345678915678',
                'national_card_img'=>null,
                'national_card_address_description'=>"",
                'national_card_Release_date'=>'2000-1-1',
                /*
                'passport_id'=>'',
                'passport_address_description'=>'',
                'passport_release_date'=>'',
                'passport_expire_date'=>'',*/

                'email'=>'mohamed_ali@gamil.com',
                'phone'=>"(+20)1287917557",
                'name_of_bank'=>'NBE',
                'number_of_account'=>56565646,
                'number_of_wif_husband'=>4,
                'number_of_wif_children'=>3,
                'time_of_attendees'=>'80:00',
                'time_of_go'=>'18:00',
                'experience_description'=>'لديه خبرا فى ادراه الموارد البشريه بشرطات القطاع الخاص',
                'address_id'=>2,
                'nationality_id'=>1,
                'jop_id'=>2,
                'jop_level_id'=>1,
                'degree_id'=>3,
                'education_status_id'=>2,
                'level_experience_id'=>4,
                'type_work_id'=>1,
                'fixed_salary'=>2000,
                'employee_status_id'=>1,

                'comapny_departments_id'=>1,
                'company_id'=>1,
                'company_branch_id'=>1,
                'direct_employee_id'=>1,

                'marital_statuses_id'=>1,
                'military_services_id'=>1,
            ],

            [
                'full_name_en'=>'General Director (un define)',
                'full_name_ar'=>'المدير العام(غير محدد)',
                'age'=>0,
                'gender'=>'M',
                'avatar'=>null,
                'data_of_start_work'=>'2000-1-1',
                'national_id'=>'12345678915678',
                'national_card_img'=>null,
                'national_card_address_description'=>"",
                'national_card_Release_date'=>'2000-1-1',
                /*
                'passport_id'=>'',
                'passport_address_description'=>'',
                'passport_release_date'=>'',
                'passport_expire_date'=>'',*/

                'email'=>'moataz2026666660@gamil.com',
                'phone'=>"(+20)1287917557",
                'name_of_bank'=>'NBE',
                'number_of_account'=>56565646,
                'number_of_wif_husband'=>4,
                'number_of_wif_children'=>3,
                'time_of_attendees'=>'80:00',
                'time_of_go'=>'18:00',
                'experience_description'=>'لديه خبرا فى ادراه الموارد البشريه بشرطات القطاع الخاص',
                'address_id'=>3,
                'nationality_id'=>1,
                'jop_id'=>3,
                'jop_level_id'=>2,
                'degree_id'=>3,
                'education_status_id'=>2,
                'level_experience_id'=>4,
                'type_work_id'=>1,
                'fixed_salary'=>2000,
                'employee_status_id'=>1,

                'comapny_departments_id'=>2,
                'company_id'=>1,
                'company_branch_id'=>1,
                'direct_employee_id'=>1,

                'marital_statuses_id'=>1,
                'military_services_id'=>1,
            ],


            [
                'full_name_en'=>'head hr  Director (un define)',
                'full_name_ar'=>'االاتش ار االمدير المباشر(غير محدد)',
                'age'=>0,
                'gender'=>'M',
                'avatar'=>null,
                'data_of_start_work'=>'2000-1-1',
                'national_id'=>'12345678915678',
                'national_card_img'=>null,
                'national_card_address_description'=>"",
                'national_card_Release_date'=>'2000-1-1',
                /*
                'passport_id'=>'',
                'passport_address_description'=>'',
                'passport_release_date'=>'',
                'passport_expire_date'=>'',*/

                'email'=>'moataz2020@gamil.com',
                'phone'=>"(+20)1287917557",
                'name_of_bank'=>'NBE',
                'number_of_account'=>56565646,
                'number_of_wif_husband'=>4,
                'number_of_wif_children'=>3,
                'time_of_attendees'=>'80:00',
                'time_of_go'=>'18:00',
                'experience_description'=>'لديه خبرا فى ادراه الموارد البشريه بشرطات القطاع الخاص',
                'address_id'=>6,
                'nationality_id'=>1,
                'jop_id'=>4,
                'jop_level_id'=>3,
                'degree_id'=>3,
                'education_status_id'=>2,
                'level_experience_id'=>4,
                'type_work_id'=>1,
                'fixed_salary'=>2000,
                'employee_status_id'=>1,

                'comapny_departments_id'=>3,
                'company_id'=>1,
                'company_branch_id'=>1,
                'direct_employee_id'=>2,

                'marital_statuses_id'=>1,
                'military_services_id'=>1,
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
        Schema::dropIfExists('employees');
    }
}
