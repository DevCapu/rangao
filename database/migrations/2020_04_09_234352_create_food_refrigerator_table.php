<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodRefrigeratorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foodRefrigerator', function (Blueprint $table) {
            $table->bigInteger('food_id')->unsigned();
            $table->bigInteger('refrigerator_id')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->date('expiration_date');
            $table->integer('notification');

            $table->foreign('food_id')->references('id')->on('foods');
            $table->foreign('refrigerator_id')->references('id')->on('refrigerators');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foodRefrigerator');
    }
}
