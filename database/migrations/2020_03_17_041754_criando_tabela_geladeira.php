<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriandoTabelaGeladeira extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geladeiras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('usuario_id')->unsigned();
            $table->bigInteger('alimento_id')->unsigned();
            $table->integer('quantidade');
            $table->integer('dias_notificacao');
            $table->string('validade');

            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('alimento_id')->references('id')->on('alimentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
