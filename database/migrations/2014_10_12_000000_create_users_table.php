<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50);
            $table->string('email',100)->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mobile',20)->nullable()->unique();
            $table->string('designation',100)->nullable();
            $table->string('joinDate',25)->nullable();
            $table->text('address',80)->nullable();
            $table->string('skill',60)->nullable();
            $table->string('educattion',80)->nullable();
            $table->string('biography',80)->nullable();
            $table->string('resume',100)->nullable();
            $table->string('certificate',100)->nullable();
            $table->unsignedInteger('bId')->nullable();
            $table->string('password');
            $table->string('readablePassword')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
