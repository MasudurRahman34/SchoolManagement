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
            $table->string('firstName',50);
            $table->string('lastName',50);
            $table->string('email',100)->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mobile',20)->nullable()->unique();
            $table->date('birthDate')->nullable();
            $table->string('blood', 20)->nullable();
            $table->text('address')->nullable();
            $table->string('password');
            $table->string('readablePassword')->nullable();
            $table->string('fatherName')->nullable();
            $table->string('motherName')->nullable();
            $table->string('fatherOccupation')->nullable();
            $table->string('MotherOccupation')->nullable();
            $table->string('fatherIncome')->nullable();
            $table->string('motherIncome')->nullable();
            $table->unsignedBigInteger('bId');
            $table->unsignedBigInteger('sectionId');
            $table->string('group');
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
