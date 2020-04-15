<?php


namespace App\Adapters;


use DevCapu\NutriLive\App\PatientCalculator;

class EnergeticNeeds
{
    public function getBasalEnergyExpenditure(string $gender, float $weight, float $height, string $birthday): float
    {
        return PatientCalculator::calculateBasalEnergyExpenditure(
            $gender,
            $weight,
            $height,
            $birthday
        );
    }

    public function getTotalEnergyExpenditure(float $basalEnergyExpenditure, string $activity): float
    {
        return PatientCalculator::calculateTotalEnergyExpenditure($basalEnergyExpenditure, $activity);
    }

    public function getBMI(float $weight, float $height, bool $rounded = true): float
    {
        return PatientCalculator::calculateBMI($weight, $height, $rounded);
    }

    public function getCaloriesToCommitObjective(float $basalEnergyExpenditure, string $objective)
    {
        return PatientCalculator::calculateCaloriesToBeIngestedToCommitObjective($basalEnergyExpenditure, $objective);
    }
}
