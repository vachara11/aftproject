<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookDepatmemtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_depatmemts', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->string('name');
            $table->string('date');
            $table->string('image')->nullable();
            $table->string('file')->nullable();
            $table->string('comnent')->nullable();
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
        Schema::dropIfExists('book_depatmemts');
    }
}
