<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpperMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upper_measurements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('top_id');
            $table->integer('chest');
            $table->integer('waist');
            $table->integer('hips');
            $table->integer('shoulder');
            $table->integer('sleeve');
            $table->integer('front');
            $table->integer('back');
            $table->integer('neck');
            $table->integer('r_low');
            $table->integer('l_low');
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
        Schema::dropIfExists('upper_measurements');
    }
}
