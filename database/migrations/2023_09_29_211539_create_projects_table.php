<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('term');
            $table->string('date');
            $table->string('ptotal')->default("รอข้อมูล")->nullable();
            $table->string('pnumber')->default("รอข้อมูล")->nullable();
            $table->string('ppercen')->default("รอข้อมูล")->nullable();
            $table->string('knumber')->default("รอข้อมูล")->nullable();
            $table->string('kpercen')->default("รอข้อมูล")->nullable();
            $table->string('budget')->default("รอข้อมูล")->nullable();
            $table->string('jbudget')->default("รอข้อมูล")->nullable();
            $table->string('status')->default("ยังไม่สรุป");
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
        Schema::dropIfExists('projects');
    }
}
