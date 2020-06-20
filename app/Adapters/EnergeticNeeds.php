<?php


namespace App\Adapters;


use DevCapu\NutriLive\App\PatientCalculator;
use Illuminate\Http\Request;

class EnergeticNeeds
{
    private float $basalEnergyExpenditure;
    private float $totalEnergyExpenditure;
    private float $bmi;
    private float $caloriesToCommitObjective;

    public function getBasalEnergyExpenditure(): float
    {
        return $this->basalEnergyExpenditure;
    }

    public function getTotalEnergyExpenditure(): float
    {
        return $this->totalEnergyExpenditure;
    }

    public function getBmi(): float
    {
        return $this->bmi;
    }

    public function getCaloriesToCommitObjective(): float
    {
        return $this->caloriesToCommitObjective;
    }

    public function calculate(Request $request): void
    {
        $this->basalEnergyExpenditure = $this->calculateBasalEnergyExpenditure(
            $request->gender,
            $request->weight,
            $request->height,
            $request->birthday,
        );
        $this->totalEnergyExpenditure = $this->calculateTotalEnergyExpenditure($this->basalEnergyExpenditure, $request->activity);
        $this->caloriesToCommitObjective = $this->calculateCaloriesToCommitObjective($this->basalEnergyExpenditure, $request->objective);
        $this->bmi = $this->calculateBMI($request->weight, $request->height);
    }

    private function calculateBasalEnergyExpenditure(string $gender, float $weight, float $height, string $birthday): float
    {
        return PatientCalculator::calculateBasalEnergyExpenditure(
            $gender,
            $weight,
            $height,
            $birthday
        );
    }

    private function calculateTotalEnergyExpenditure(float $basalEnergyExpenditure, string $activity): float
    {
        return PatientCalculator::calculateTotalEnergyExpenditure($basalEnergyExpenditure, $activity);
    }

    public function calculateBMI(float $weight, float $height, bool $rounded = true): float
    {
        return PatientCalculator::calculateBMI($weight, $height, $rounded);
    }

    private function calculateCaloriesToCommitObjective(float $basalEnergyExpenditure, string $objective)
    {
        return PatientCalculator::calculateCaloriesToBeIngestedToCommitObjective($basalEnergyExpenditure, $objective);
    }
}
