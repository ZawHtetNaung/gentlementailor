<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeToTexturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('textures', function (Blueprint $table) {
            //
            $table->integer('main_texture_id')->after('id');
            $table->integer('sub_category_id')->after('main_texture_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('textures', function (Blueprint $table) {
            //
        });
    }
}
