<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('gender', ['male', 'female']);
            $table->enum('objective', ['lose', 'gain', 'define']);
            $table->float('basalEnergyExpenditure');
            $table->float('totalEnergyExpenditure');
            $table->float('caloriesToCommitObjective');
            $table->float('height');
            $table->float('weight');
            $table->string("birthday");
            $table->string('photo')->default("");
            $table->enum('activity', ['sedentary', 'littleActive', 'active', 'veryActive']);
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
        Schema::dropIfExists('users');
    }
}
