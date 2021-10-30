<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('api_token')->nullable();
            $table->string('password');

            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');

            $table->longText('permissions_array')->default(json_encode(array()));

            $table->enum('as',['HR','ONTHER'])->default('ONTHER');

            $table->rememberToken();
            $table->timestamps();
        });


        $fak_en = \Faker\Factory::create();

        DB::table('users')->insert([
            ['name'=>$fak_en->name(),'email'=>'fadyfared141@gmail.com','password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1,'permissions_array'=>json_encode(array()),'as'=>"ONTHER"],
            ['name'=>$fak_en->name(),'email'=>'fadyfared142@gmail.com','password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>2,'permissions_array'=>json_encode(array()),'as'=>"ONTHER"],
            ['name'=>'Hr','email'=>'fadyfared143@gmail.com','password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>3,'permissions_array'=>json_encode(array(1,2,3,7)),'as'=>"HR"],

            /*['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            ['name'=>$fak_en->name(),'email'=>$fak_en->email,'password'=>'$2y$10$CvNMruPNAv02ZM05iCPp7OGgOYDInzczf706HACP1NaAvHfv6zVpG','employee_id'=>1],
            */
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
