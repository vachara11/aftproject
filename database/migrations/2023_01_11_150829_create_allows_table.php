<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allows', function (Blueprint $table) {
            $table->id();
            $table->string('datewr')->comment("วันที่เขียนขออนุญาต");
            $table->string('datewr1')->comment("วันที่เขียนขออนุมัติ");
            $table->string('number')->comment("เลขที่หนังสือขออนุญาต");
            $table->string('number1')->comment("เลขที่หนังสือขออนุมัติ");
            $table->string('name')->comment("ชื่อโครงการ");
            $table->text('activity')->nullable()->comment("ชื่อกิจกรรม(ถ้ามี)");
            $table->string('date')->nullable()->comment("วันที่จัดทำโครงการ");
            $table->text('location')->nullable()->comment("สถานที่ทำโครงการ");
            $table->text('objective')->comment("วัตถุประสงค์ของโครงการ");
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
        Schema::dropIfExists('allows');
    }
}
