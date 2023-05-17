<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporaryCustomizeStepDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporary_customize_step_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('temporary_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('customize_category_id')->nullable();
            $table->integer('package_id');
            $table->integer('style_id');
            $table->string('style_name');
            $table->integer('fitting');
            $table->integer('texture_id');
            $table->integer('jacket_id');
            $table->integer('vest_id');
            $table->integer('pant_id');
            $table->integer('upper_id');
            $table->integer('lower_id');
            $table->integer('order_id');
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
        Schema::dropIfExists('temporary_customize_step_data');
    }
}
