<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('senha');
            $table->enum('sexo', ['MASCULINO', 'FEMININO']);
            $table->enum('Objetivo', ['lose', 'gain', 'define']);
            $table->float('gastoDeEnergiaBasal');
            $table->float('gastoDeEnergiaTotal');
            $table->float('caloriasParaConseguirObjetivo');
            $table->float('altura');
            $table->float('peso');
            $table->string("nascimento");
            $table->string('photo')->default("");
            $table->enum('atividade', ['sedentary', 'littleActive', 'active', 'veryActive']);
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
        Schema::dropIfExists('usuarios');
    }
}
