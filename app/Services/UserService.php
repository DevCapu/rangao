<?php


namespace App\Services;


use App\Adapters\EnergeticNeeds;
use DevCapu\NutriLive\App\PatientCalculator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function calculateAge(string $birthday): int
    {
        return PatientCalculator::calculateAge($birthday);
    }

    /**
     * TODO: Como essa funcionalidade é um pouco maior, eu acho que deve ter algum Design Pattern de criação que facilite isso pra mim, ou se não facilitar pelo menos deixe o código mais limpo
     * @param Request $request
     * @param float $basalEnergeticExpenditure
     * @param float $totalEnergeticExpenditure
     * @param float $caloriesToCommitObjective
     * @return array
     */
    public function fillUser(Request $request, EnergeticNeeds $energeticNeeds): array
    {
        return [
            'name' => $request->name,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'height' => $request->height,
            'weight' => $request->weight,
            'activity' => $request->activity,
            'basalEnergyExpenditure' => $energeticNeeds->getBasalEnergyExpenditure(),
            'totalEnergyExpenditure' => $energeticNeeds->getTotalEnergyExpenditure(),
            'caloriesToCommitObjective' => $energeticNeeds->getCaloriesToCommitObjective(),
            'photo' => ''
        ];
    }
}
