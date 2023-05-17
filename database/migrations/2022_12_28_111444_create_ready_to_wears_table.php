<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReadyToWearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ready_to_wears', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->unsignedBigInteger('texture_id');
            $table->unsignedBigInteger('style_id');
            $table->unsignedBigInteger('package_id');
            $table->string('photo_one');
            $table->string('photo_two');
            $table->string('photo_three');
            $table->string('photo_four');
            $table->string('photo_five');
            $table->string('description');
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
        Schema::dropIfExists('ready_to_wears');
    }
}
