<?php

namespace Tests\Unit\Application;

use App\Adapters\EnergeticNeeds;
use PHPUnit\Framework\TestCase;

class EnergeticNeedsTest extends TestCase
{
    public function testShouldCalculateBmi(): void
    {
        $energeticNeeds = new EnergeticNeeds();
        $weight = 78.8;
        $height = 1.78;
        $bmi = $energeticNeeds->calculateBmi($weight, $height);

        self::assertEqualsWithDelta(24.8, $bmi, 0.1);
        self::assertIsFloat($bmi);
    }
}
