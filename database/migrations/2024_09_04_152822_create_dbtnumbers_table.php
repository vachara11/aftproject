<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbtnumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dbtnumbers', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('date');
            $table->string('go');
            $table->string('to');
            $table->string('content');
            $table->string('practice');
            $table->string('note')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('dbtnumbers');
    }
}
