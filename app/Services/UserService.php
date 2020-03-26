<?php

namespace App\Services;

use DevCapu\NutriLive\App\PatientCalculator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function fillUser(Request $request, float $basalEnergyExpenditure, float $totalEnergyExpenditure, float $caloriesToCommitObjective): array
    {

        return [
            'name' => $request->name,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'objective' => $request->objective,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'height' => $request->height,
            'weight' => $request->weight,
            'activity' => $request->activity,
            'basalEnergyExpenditure' => $basalEnergyExpenditure,
            'totalEnergyExpenditure' => $totalEnergyExpenditure,
            'caloriesToCommitObjective' => $caloriesToCommitObjective,
            'photo' => ''
        ];
    }
}
