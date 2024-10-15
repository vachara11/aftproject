<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('year')->comment("ปีการศึกษา");
            $table->string('startnumber')->comment("เลขที่เริ่มต้น");
            $table->string('endnumber')->comment("เลขที่สุดท้าย");
            $table->string('date')->comment("ให้ไว้ ณ วันที่");
            $table->string('name')->comment("รายการ");
            $table->string('note')->nullable()->comment("หมายเหตุ");
            $table->string('file')->nullable()->comment("ไฟล์");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificates');
    }
}
