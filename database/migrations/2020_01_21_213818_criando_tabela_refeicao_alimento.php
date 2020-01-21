<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriandoTabelaRefeicaoAlimento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refeicao_alimentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_refeicao')->unsigned();
            $table->bigInteger('id_alimento')->unsigned();

            $table->foreign('id_refeicao')->references('id')->on('refeicaos');
            $table->foreign('id_alimento')->references('id')->on('alimentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refeicao_alimentos');
    }
}
