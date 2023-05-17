<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_order_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cart_order_id');
            $table->integer('user_id');
            $table->integer('item_id');
            $table->string('item_name');
            $table->string('photo');
            $table->integer('price');
            $table->integer('current_qty');
            $table->integer('qty');
            $table->integer('each_sub');
            $table->string('type');
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
        Schema::dropIfExists('cart_order_products');
    }
}




