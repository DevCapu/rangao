<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriandoTabelaRefeicao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refeicoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("data");
            $table->enum('periodo', ['CAFÉ DA MANHÃ', 'ALMOÇO', 'CAFÉ DA TARDE', 'JANTAR']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refeicao');
    }
}
