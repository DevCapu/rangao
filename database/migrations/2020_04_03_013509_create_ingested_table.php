<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngestedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingested', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('food_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->string('period');
            $table->string('date');
            $table->float('calories')->unsigned();

            $table->foreign('food_id')->references('id')->on('foods');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingested');
    }
}
