<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('studentId');
            $table->unsignedBigInteger('subjectId');
            $table->string('ca');
            $table->string('mcq');
            $table->string('written');
            $table->string('practical');
            $table->string('total');
            $table->string('gradeName');
            $table->double('gradePoint',8,2);
            $table->string('examType');
            $table->string('examAttendence');
            $table->unsignedInteger('bId');
            $table->unsignedBigInteger('sectionId');
            $table->unsignedBigInteger('classId');
            $table->unsignedInteger('sessionYearId')->comment('sessionYearId');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marks');
    }
}
