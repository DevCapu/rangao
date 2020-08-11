<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesAndCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipesAndCategories', function (Blueprint $table) {
            $table->bigInteger('recipe_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();

            $table->foreign('recipe_id')->references('id')->on('recipes');
            $table->foreign('category_id')->references('id')->on('recipeCategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipesAndCategories');
    }
}
