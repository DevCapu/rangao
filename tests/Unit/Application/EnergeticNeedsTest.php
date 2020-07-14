<?php

namespace Tests\Unit\Application;

use App\Adapters\EnergeticNeeds;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class EnergeticNeedsTest extends TestCase
{
    /**
     * @var EnergeticNeeds
     */
    private EnergeticNeeds $energeticNeeds;

    protected function setUp(): void
    {
        $this->energeticNeeds = new EnergeticNeeds();
    }

    public function testShouldCalculateBmi(): void
    {
        $weight = 78.8;
        $height = 1.78;
        $bmi = $this->energeticNeeds->calculateBmi($weight, $height);

        self::assertEqualsWithDelta(24.5, $bmi, 0.5);
        self::assertIsFloat($bmi);
    }

    /**
     * @dataProvider calculateBMIWithWrongArguments
     * @param float $weight
     * @param float $height
     */
    public function testShouldNotCalculateBMIWithWrongArguments(float $weight, float $height): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->energeticNeeds->calculateBMI($weight, $height);
    }

    public function testShouldCalculateBasalEnergyExpenditure(): void
    {
        $gender = 'male';
        $weight = 78.8;
        $height = 1.78;
        $birthday = '2000-10-15';

        $basalEnergyExpenditure = $this->energeticNeeds
            ->calculateBasalEnergyExpenditure($gender, $weight, $height, $birthday);

        self::assertEqualsWithDelta(1033.65, $basalEnergyExpenditure, 0.5);
        self::assertIsFloat($basalEnergyExpenditure);
    }

    /**
     * @dataProvider calculateBasalEnergyExpenditureWithWrongArguments
     * @param string $gender
     * @param float $weight
     * @param float $height
     * @param string $birthday
     */
    public function testInvalidArgumentsShouldNotCalculateBasalEnergyExpenditure(string $gender, float $weight, float $height, string $birthday): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->energeticNeeds->calculateBasalEnergyExpenditure($gender, $weight, $height, $birthday);
    }

    public function testShouldCalculateTotalEnergyExependiture(): void
    {
        $totalEnergyExpenditure = $this->energeticNeeds->calculateTotalEnergyExpenditure(1033.65, 'sedentary');
        self::assertEqualsWithDelta(1240.38, $totalEnergyExpenditure, 0.5);
    }

    /**
     * @dataProvider calculateTotalEnergyExpenditureWithWrongArguments
     * @param float $basalEnergyExpenditure
     * @param string $activity
     */
    public function testInvalidArgumentsShouldNotCalculateTotalEnergyExpenditure(float $basalEnergyExpenditure, string $activity): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->energeticNeeds->calculateTotalEnergyExpenditure($basalEnergyExpenditure, $activity);
    }

    public function testShouldCalculateCaloriesToCommitObjective(): void
    {
        $caloriesToCommitObjective = $this->energeticNeeds->calculateCaloriesToCommitObjective(1240.38, 'lose');
        self::assertEqualsWithDelta(955.0926, $caloriesToCommitObjective, 0.1);
    }

    /**
     * @dataProvider calculateCaloriesToCommitObjectiveWithWrongArguments
     * @param float $totalEnergyExpenditure
     * @param string $objective
     */
    public function testShouldNotCalculateCaloriesToCommitObjective(float $totalEnergyExpenditure, string $objective): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->energeticNeeds->calculateCaloriesToCommitObjective($totalEnergyExpenditure, $objective);
    }

    public function calculateBMIWithWrongArguments(): array
    {
        return [
            [-78, 1.78],
            [78, -1.78],
        ];
    }

    public function calculateBasalEnergyExpenditureWithWrongArguments(): array
    {
        return [
            ['wrongArgmument', 78.8, 1.78, '2000-10-15'],
            ['male', -78.7, 1.78, '2000-10-15']
        ];
    }

    public function calculateTotalEnergyExpenditureWithWrongArguments(): array
    {
        return [
            [-78.0, 'littleActive'],
            [1033.65, 'invalidArgument'],
            [-8.0, 'invalidArgument']
        ];
    }

    public function calculateCaloriesToCommitObjectiveWithWrongArguments(): array
    {
        return [
            [-1, 'lose'],
            [1302, 'invalidArgument']
        ];
    }
}
