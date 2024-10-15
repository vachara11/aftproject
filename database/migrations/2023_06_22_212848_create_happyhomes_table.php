<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHappyhomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('happyhomes', function (Blueprint $table) {
            $table->id();
            $table->string('stu_card');
            $table->string('name');
            $table->string('department');
            $table->string('class');
            $table->string('room');
            $table->string('actirity');
            $table->time('date');
            $table->string('loction');
            $table->string('file');
            $table->string('file1');
            $table->string('file2');
            $table->string('file3');
            $table->text('benefit');
            $table->string('status')->default("รอตรวจสอบข้อมูล");
            $table->boolean('edit')->default(0);

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
        Schema::dropIfExists('happyhomes');
    }
}
