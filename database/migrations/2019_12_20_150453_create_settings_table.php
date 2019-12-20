<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('store_name');
            $table->string('store_owner');
            $table->text('address');
            $table->string('email');
            $table->string('phone');
            $table->string('opening_time');
            $table->string('closing_time');
            $table->string('country');
            $table->string('province');
            $table->string('city');
            $table->string('logo');
            $table->string('icon');
            $table->string('currency');
            $table->boolean('cod')->nullable()->default(0);
            $table->boolean('online_payment')->nullable()->default(0);
            $table->double('deliveryfee')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
