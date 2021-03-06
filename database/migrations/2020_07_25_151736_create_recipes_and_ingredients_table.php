<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesAndIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipesAndIngredients', function (Blueprint $table) {
            $table->bigInteger('recipe_id')->unsigned();
            $table->bigInteger('ingredient_id')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->string('measure');

            $table->foreign('recipe_id')->references('id')->on('recipes');
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipesAndIngredients');
    }
}
