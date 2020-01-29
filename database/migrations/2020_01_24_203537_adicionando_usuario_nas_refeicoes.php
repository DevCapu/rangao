<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdicionandoUsuarioNasRefeicoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('refeicoes', function (Blueprint $table) {
            $table->bigInteger('usuario_id')->unsigned();

            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            //
        });
    }
}
