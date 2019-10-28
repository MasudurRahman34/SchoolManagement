<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplyInstitutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_institutes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('nameOfTheInstitution');
            $table->string('eiinNumber', 50);
            $table->string('phoneNumber')->unique();
            $table->string('district', 50);
            $table->string('upazilla', 50);
            $table->string('nameOfHead', 60);
            $table->string('schoolType', 50);
            $table->text('address');
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
        Schema::dropIfExists('apply_institutes');
    }
}
