<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('userId');
            $table->unsignedInteger('classId')->comment('classId');
            $table->unsignedInteger('bId');
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
        Schema::dropIfExists('class_teachers');
    }
}
