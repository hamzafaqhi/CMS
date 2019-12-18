<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_code');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('status');
            $table->string('payment_type');
            $table->string('cart_id');
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->integer('user_id');
            $table->integer('post_code');
            $table->string('phone');
            $table->string('email');
            $table->integer('total_price');
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
        Schema::dropIfExists('orders');
    }
}
