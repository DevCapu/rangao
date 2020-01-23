<?php


namespace App\Servicos;


use DevCapu\NutriLive\App\PatientCalculator;

class CalculadoraDeNecessidadesEnergeticas
{
    private PatientCalculator $patientCalculator;

    /**
     * CalculadoraDeNecessidadesEnergeticas constructor.
     * @param PatientCalculator $patientCalculator
     */
    public function __construct(PatientCalculator $patientCalculator)
    {
        $this->patientCalculator = new PatientCalculator();
    }

    public function calculaGastoEnergeticoBasal(string $sexo, float $peso, float $altura, string $dataDeNascimento): float
    {
        return $this->patientCalculator->calculateBasalEnergyExpenditure($sexo, $peso, $altura, $dataDeNascimento);
    }

    public function calculaGastoEnergeticoTotal($gastoEnergeticoBasal, $atividade): float
    {
        return $this->patientCalculator->calculateTotalEnergyExpenditure($gastoEnergeticoBasal, $atividade);
    }

    public function calculaIMC(float $peso, float $altura, bool $rounded = false): float
    {
        $imc = $this->patientCalculator->calculateBMI($peso, $altura);
        return $rounded ? round($imc, 2) : $imc;
    }

    public function calculaCaloriasNecessariasParaCumprirObjetivo(float $gastoEnergeticoBasal, string $objetivo): float
    {
        return $this->patientCalculator->calculateCaloriesToBeIngestedToCommitObjective($gastoEnergeticoBasal, $objetivo);
    }

}
