<?php


namespace App\Adapters;


use DevCapu\NutriLive\App\PatientCalculator;
use DomainException;
use Illuminate\Http\Request;
use InvalidArgumentException;

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

    public function calculateBasalEnergyExpenditure(string $gender, float $weight, float $height, string $birthday): float
    {
        return PatientCalculator::calculateBasalEnergyExpenditure(
            $gender,
            $weight,
            $height,
            $birthday
        );
    }

    public function calculateTotalEnergyExpenditure(float $basalEnergyExpenditure, string $activity): float
    {
        $avaliableActivities = ['sedentary', 'littleActive', 'active', 'veryActive'];

        $elementNotExists = !in_array($activity, $avaliableActivities, true);
        if ($elementNotExists) {
            throw new InvalidArgumentException("Activity doesn't exists or basalEnergyExpenditure < 400");
        }

        if ($basalEnergyExpenditure < 400) {
            throw new DomainException("Basal energy expenditure cannot be less than 400");
        }

        return PatientCalculator::calculateTotalEnergyExpenditure($basalEnergyExpenditure, $activity);
    }

    public function calculateBMI(float $weight, float $height, bool $rounded = true): float
    {
        return PatientCalculator::calculateBMI($weight, $height, $rounded);
    }

    public function calculateCaloriesToCommitObjective(float $totalEnergyExpenditure, string $objective): float
    {
        $avaliableObjectives = ['lose', 'gain', 'define'];
        $isNotAnObjective = !in_array($objective, $avaliableObjectives, true);

        if ($isNotAnObjective) {
            throw new InvalidArgumentException("$objective is not an objective or totalEnergyExpenditure < 400");
        }

        if ($totalEnergyExpenditure < 400) {
            throw new DomainException("Total energy expenditure cannot be less than 400");
        }

        return PatientCalculator::calculateCaloriesToBeIngestedToCommitObjective($totalEnergyExpenditure, $objective);
    }
}
