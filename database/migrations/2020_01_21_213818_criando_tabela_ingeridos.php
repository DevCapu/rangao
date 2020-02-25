<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriandoTabelaIngeridos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingeridos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('refeicao_id')->unsigned();
            $table->bigInteger('alimento_id')->unsigned();
            $table->integer('quantidade');

            $table->foreign('refeicao_id')->references('id')->on('refeicoes');
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
        Schema::dropIfExists('refeicao_alimentos');
    }
}
