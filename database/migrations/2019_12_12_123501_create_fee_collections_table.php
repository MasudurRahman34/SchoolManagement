<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeeCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_collections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('feeGenerateId')->comment('autoGen');
            $table->unsignedBigInteger('studentId')->comment('student_table_id');
            $table->unsignedBigInteger('feeId')->comment('fee_table_id');
            $table->float('amount',8,2)->comment('amount');
            $table->string('month', 30)->comment();
            $table->string('year', 30)->comment('year');
            $table->unsignedBigInteger('bId')->comment('branch_table_id');
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
        Schema::dropIfExists('fee_collections');
    }
}
