<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLowerMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lower_measurements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('pant_id');
            $table->integer('waist');
            $table->integer('hips');
            $table->integer('crotch');
            $table->integer('thighs');
            $table->integer('length');
            $table->integer('bottom');
            $table->integer('knee');
            $table->integer('shorts');
            $table->integer('stomach');
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
        Schema::dropIfExists('lower_measurements');
    }
}
