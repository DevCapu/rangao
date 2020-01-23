<?php


namespace App\Logica;


use DevCapu\NutriLive\App\PatientCalculator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioLogica
{
    public function calculaIdade(string $dataDeNascimento): int
    {
        return PatientCalculator::calculateAge($dataDeNascimento);
    }

    public function calculaGastoEnergeticoBasal(string $sexo, float $peso, float $altura, string $dataDeNascimento): float
    {
        return PatientCalculator::calculateBasalEnergyExpenditure($sexo, $peso, $altura, $dataDeNascimento);
    }

    public function calculaGastoEnergeticoTotal($gastoEnergeticoBasal, $atividade): float
    {
        return PatientCalculator::calculateTotalEnergyExpenditure($gastoEnergeticoBasal, $atividade);
    }

    public function calculaIMC(float $peso, float $altura, bool $rounded = false): float
    {
        $imc = PatientCalculator::calculateBMI($peso, $altura);
        return $rounded ? round($imc, 2) : $imc;
    }

    public function calculaCaloriasNecessariasParaCumprirObjetivo(float $gastoEnergeticoBasal, string $objetivo): float
    {
        return PatientCalculator::calculateCaloriesToBeIngestedToCommitObjective($gastoEnergeticoBasal, $objetivo);
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
