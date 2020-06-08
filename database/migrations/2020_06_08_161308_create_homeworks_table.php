<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homeworks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('description');
            $table->unsignedInteger('sessionYearId')->comment('sessionYearId');
            $table->unsignedBigInteger('classId');
            $table->unsignedBigInteger('sectionId');
            $table->unsignedBigInteger('subjectId');
            $table->string('group');
            $table->string('endDate');
            $table->unsignedInteger('bId');
            $table->boolean('published')->default(0)->comment('0-> not published');
            $table->unsignedBigInteger('userId')->comment('mark_entry_user');
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
        Schema::dropIfExists('homeworks');
    }
}
