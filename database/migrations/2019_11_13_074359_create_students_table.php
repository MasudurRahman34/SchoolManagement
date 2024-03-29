<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigint('studentId',50);
            $table->string('firstName',50);
            $table->string('lastName',50);
            $table->string('email',100)->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mobile',20)->nullable()->unique();
            $table->date('birthDate')->nullable();
            $table->string('blood', 20)->nullable();
            $table->text('address')->nullable();
            $table->string('password');
            $table->integer('readablePassword')->nullable();
            $table->string('fatherName', 60)->nullable();
            $table->string('motherName', 60)->nullable();
            $table->string('fatherOccupation', 50)->nullable();
            $table->string('MotherOccupation', 50)->nullable();
            $table->integer('fatherIncome')->nullable();
            $table->integer('motherIncome')->nullable();
            $table->integer('age')->nullable();
            $table->integer('roll')->nullable();
            $table->string('gender', 20)->nullable();
            $table->string('religion', 20)->nullable();
            $table->unsignedBigInteger('bId');
            $table->unsignedBigInteger('sectionId');
            $table->string('group', 30);
            $table->unsignedInteger('optionalSubjectId')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('bId')
            ->references('id')->on('school_branches')
            ->onDelete('cascade');
            $table->foreign('sectionId')
            ->references('id')->on('sections')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
