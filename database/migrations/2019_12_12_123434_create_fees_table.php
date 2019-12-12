<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type', 30)->comment('gov, nonGov');
            $table->string('name', 30)->comment('name');
            $table->float('amount',8,2)->comment('amount');
            $table->unsignedBigInteger('bId')->comment('branch_table_id');
            $table->unsignedBigInteger('classId')->comment('class_table_id');
            $table->Integer('status')->comment('disable, enable');
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
        Schema::dropIfExists('fees');
    }
}
