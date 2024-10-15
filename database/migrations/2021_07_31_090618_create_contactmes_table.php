<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactmesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactmes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //ชื่อ-นามสกุล
            $table->string('email'); //อีเมล์
            $table->string('phone'); //เบอร์โทร
            $table->text('message'); //ข้อความ
            $table->string('status')->nullable(); //ข้อความ
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
        Schema::dropIfExists('contactmes');
    }
}
