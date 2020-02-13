<?php

use App\Usuario;
use Illuminate\Database\Seeder;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            "nome" => "Felipe Moreno Borges",
            "nascimento" => "15/10/2000",
            "sexo" => "male",
            "objetivo" => "lose",
            "email" => "admin@gmail.com",
            "senha" => Hash::make("admin1234"),
            "altura" => 1.78,
            "peso" => 76.15,
            "atividade" => 'littleActive',
            "gastoEnergeticoBasal" => 1022.60,
            "gastoEnergeticoTotal" => 1533.90,
            "caloriasParaConseguirObjetivo" => 1181.10,
            "foto" => ""
        ]);
    }
}
