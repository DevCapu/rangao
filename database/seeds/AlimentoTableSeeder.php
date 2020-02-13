<?php

use App\Alimento;
use Illuminate\Database\Seeder;

class AlimentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alimento = new Alimento();
        $alimento->nome = "Banana";
        $alimento->calorias = 310;
        $alimento->medida = "Unidade";
        $alimento->save();

        $alimento = new Alimento();
        $alimento->nome = "Arroz";
        $alimento->calorias = 310;
        $alimento->medida = "Escumadeira";
        $alimento->save();

        $alimento = new Alimento();
        $alimento->nome = "Feijão";
        $alimento->calorias = 310;
        $alimento->medida = "Unidade";
        $alimento->save();

        $alimento = new Alimento();
        $alimento->nome = "Brócolis";
        $alimento->calorias = 54;
        $alimento->medida = "Unidade";
        $alimento->save();

        $alimento = new Alimento();
        $alimento->nome = "Bolacha recheada";
        $alimento->calorias = 4;
        $alimento->medida = "Unidade";
        $alimento->save();

        $alimento = new Alimento();
        $alimento->nome = "Leite";
        $alimento->calorias = 100;
        $alimento->medida = "250ml";
        $alimento->save();

        $alimento = new Alimento();
        $alimento->nome = "Achocolatado";
        $alimento->calorias = 54;
        $alimento->medida = "Colher";
        $alimento->save();
    }
}
