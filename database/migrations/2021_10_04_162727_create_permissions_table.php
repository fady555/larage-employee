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


             //employee]
             ['name_en'=>'Show employees','name_ar'=>'اظهار الموظفين','cheek'=>'1'],//1
             ['name_en'=>'Add employee','name_ar'=>'اضافه الموظف','cheek'=>'0'],//2
             ['name_en'=>'edit employee','name_ar'=>'التعديل على الموظف','cheek'=>'0'],//3
             ['name_en'=>'Delete employee','name_ar'=>'حذف الموظف','cheek'=>'0'],//4


            //jop
            ['name_en'=>'Show jops','name_ar'=>'اظهار الوظائف','cheek'=>'1'],//5
            ['name_en'=>'Add jop','name_ar'=>'اضافه وظيفه','cheek'=>'0'],//6
            ['name_en'=>'edit jop','name_ar'=>'التعديل على وظيفه','cheek'=>'0'],//7
            ['name_en'=>'Delete jop','name_ar'=>'حذف وظيفه','cheek'=>'0'],//8

            //type of work
            ['name_en'=>'Show jops','name_ar'=>'اظهار نوع العمل','cheek'=>'1'],//9
            ['name_en'=>'Add type of work','name_ar'=>'اضافه نوع العمل','cheek'=>'0'],//10
            ['name_en'=>'edit type of work','name_ar'=>'التعديل على نوع العمل','cheek'=>'0'],//11
            ['name_en'=>'Delete type of work','name_ar'=>'حذف نوع العمل','cheek'=>'0'],//12

            //education status
            ['name_en'=>'Show educations status','name_ar'=>'اظهار الحالات التعلميه','cheek'=>'1'],//13
            ['name_en'=>'Add education status','name_ar'=>'اضافه الحاله التعلميه','cheek'=>'0'],//14
            ['name_en'=>'edit education status','name_ar'=>'التعديل على الحاله التعلميه','cheek'=>'0'],//15
            ['name_en'=>'Delete education status','name_ar'=>'حذف الحاله التعلميه','cheek'=>'0'],//16

            //level experence

            ['name_en'=>'Show levels experience','name_ar'=>'اظهار الحال التعلميه','cheek'=>'1'],//17
            ['name_en'=>'Add level experience','name_ar'=>'اضافه الحاله التعلميه','cheek'=>'0'],//18
            ['name_en'=>'edit level experience','name_ar'=>'التعديل على الحاله التعلميه','cheek'=>'0'],//19
            ['name_en'=>'Delete level experience','name_ar'=>'حذف الحاله التعلميه','cheek'=>'0'],//20

            //degreee
            ['name_en'=>'Show degrees','name_ar'=>'اظهار الدرجات العلميه','cheek'=>'1'],//21
            ['name_en'=>'Add degree','name_ar'=>'اضافه الدرجات العلمي','cheek'=>'0'],//22
            ['name_en'=>'edit degree','name_ar'=>'التعديل على الدرجات العلميه','cheek'=>'0'],//23
            ['name_en'=>'Delete degree','name_ar'=>'حذف الدرجات العلميه','cheek'=>'0'],//24


            //company
            //=============================================head direct hr =====================================


            //company department
            ['name_en'=>'Show company departments','name_ar'=>'اظهاراقسام الشركه','cheek'=>'1'],//25
            ['name_en'=>'Add company deparment','name_ar'=>'اضافه قسم شركه','cheek'=>'0'],//26
            ['name_en'=>'edit company deparment','name_ar'=>'التعديل على قسمم الشركه','cheek'=>'0'],//27
            ['name_en'=>'Delete company deparment','name_ar'=>'حذف قسم الشركه','cheek'=>'0'],//28

            //conpany branch
            ['name_en'=>'Show company branchs','name_ar'=>'اظهار افرع الشركه','cheek'=>'1'],//29
            ['name_en'=>'Add company branch','name_ar'=>'اضافه فرع للشركه','cheek'=>'0'],//30
            ['name_en'=>'edit company branch','name_ar'=>'التعديل على فرع للشركه','cheek'=>'0'],//31
            ['name_en'=>'Delete company branch','name_ar'=>'حذف فرع للشركه','cheek'=>'0'],//32



            //events and effectss
            ['name_en'=>'Show events and effectss','name_ar'=>'اظهار حدث او فعاليه','cheek'=>'1'],//33
            ['name_en'=>'Add event and effect','name_ar'=>'اضافه حدث او فعاليه','cheek'=>'0'],//34
            ['name_en'=>'edit event and effect','name_ar'=>'التعديل على حدث او فعاليه','cheek'=>'0'],//45
            ['name_en'=>'Delete event and effect','name_ar'=>'حذف حدث او فعاليه','cheek'=>'0'],//36

            //general
            ['name_en'=>'Show generals','name_ar'=>'اظهار التعاميم','cheek'=>'1'],//37
            ['name_en'=>'Add general','name_ar'=>'اضافه تعاميم','cheek'=>'0'],//38
            ['name_en'=>'edit general','name_ar'=>'التعديل على تعاميم','cheek'=>'0'],//39
            ['name_en'=>'Delete general','name_ar'=>'حذف تعاميم','cheek'=>'0'],//40


            //leave request
            ['name_en'=>'Show leave requests','name_ar'=>'اظهار طلبات الاجازه','cheek'=>'0'],//41
            ['name_en'=>'Assign leave request','name_ar'=>'التاشير على طلبات الاجازه','cheek'=>'0'],//42
            ['name_en'=>'Delete leave request','name_ar'=>'حذف طلبات الاجازه','cheek'=>'0'],//43




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
