<?php


namespace App\Servicos;


use DevCapu\NutriLive\App\PatientCalculator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioService
{
    private PatientCalculator $calculadoraDoPaciente;

    /**
     * UsuarioService constructor.
     * @param PatientCalculator $calculadoraDoPaciente
     */
    public function __construct(PatientCalculator $calculadoraDoPaciente)
    {
        $this->calculadoraDoPaciente = $calculadoraDoPaciente;
    }

    public function calculaIdade(string $dataDeNascimento): int
    {
        return $this->calculadoraDoPaciente->calculateAge($dataDeNascimento);
    }

    public function preencheUsuario(Request $request, float $gastoEnergeticoBasal, float $gastoEnergeticoTotal, float $caloriasParaConseguirObjetivo): array
    {
        return [
            "nome" => $request->nome,
            "nascimento" => $request->nascimento,
            "sexo" => $request->sexo,
            "objetivo" => $request->objetivo,
            "email" => $request->email,
            "senha" => Hash::make($request->senha),
            "altura" => $request->altura,
            "peso" => $request->peso,
            "atividade" => $request->atividade,
            "gastoEnergeticoBasal" => $gastoEnergeticoBasal,
            "gastoEnergeticoTotal" => $gastoEnergeticoTotal,
            "caloriasParaConseguirObjetivo" => $caloriasParaConseguirObjetivo,
            "foto" => ""
        ];
    }
}
