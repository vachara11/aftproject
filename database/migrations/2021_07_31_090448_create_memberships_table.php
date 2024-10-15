<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string('days'); //วันที่ สมัคร
            $table->string('months'); //เดือน สมัคร
            $table->string('years'); //พ.ศ. สมัคร
            $table->string('name'); //ชื่อ-นามสกุล
            $table->string('classroom');//ระดับชั้น
            $table->string('student_id');//รหัสนักเรียน นักศึกษา
            $table->string('department'); //สาขาวิชา
            $table->string('major_works'); //สาขางาน
            $table->string('day'); //วันที่ เกิด
            $table->string('month'); //เดือน เกิด
            $table->string('year'); //พ.ศ. เกิด
            $table->string('house_number'); //บ้านเลขที่
            $table->string('alley')->nullable(); //ตรอก/ซอย
            $table->string('road')->nullable(); //ถนน/หมูที่
            $table->string('district'); //แขวง/ตำบล
            $table->string('county'); //เขต/อำเภอ
            $table->string('province'); //จังหวัด
            $table->string('zip_code'); //รหัสไปรษณีย์
            $table->string('phone'); //เบอร์โทรศัพท์
            $table->string('father'); //ชื่อบิดา
            $table->string('mother'); //ชื่อมารดา
            $table->string('professional'); //ชมรมวิชาชีพ
            $table->string('parent'); //ชื่อผู้ปกครอง
            $table->timestamps();//วันที่สมัคร
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memberships');
    }
}
