<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpRequest;
use App\Models\User;
use App\Services\MealService;
use App\Services\UserService;
use App\Utils\DateUtil;
use DevCapu\NutriLive\App\PatientCalculator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    private PatientCalculator $patientCalculator;

    public function __construct(PatientCalculator $patientCalculator)
    {
        $this->patientCalculator = $patientCalculator;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        //TODO: Crete view
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SignupRequest $request
     * @param UserService $userService
     * @return RedirectResponse
     */
    public function store(SignupRequest $request, UserService $userService)
    {
        $basalEnergyExpenditure = $this->patientCalculator->calculateBasalEnergyExpenditure(
            $request->gender,
            $request->weight,
            $request->height,
            $request->birthday
        );

        $totalEnergyExpenditure = $this->patientCalculator->calculateTotalEnergyExpenditure(
          $basalEnergyExpenditure,
          $request->activity
        );

        $caloriesToCommitObjective = $this->patientCalculator->calculateCaloriesToBeIngestedToCommitObjective(
            $totalEnergyExpenditure,
            $request->objective
        );

        $userData = $userService->fillUser($request, $basalEnergyExpenditure, $totalEnergyExpenditure, $caloriesToCommitObjective);

        $user = (new User())->create($userData);

        Auth::login($user);

        return redirect()->route('users.show');

    }

    public function show(MealService $mealService)
    {
        $meals = $mealService->getUserMeals(Auth::id());

        $max = $mealService->calculatesMaximumNumberOfLinesOfTheMenu($meals);
        $birthday = DateUtil::parseToAmericanFormat(Auth::user()->birthday);
        $age = $this->patientCalculator->calculateAge($birthday);


        $viewData = [
            'user' => Auth::user(),
            'age' => $age,
            'meals'=> $meals,
            'numberOfLines' =>$max
        ];
        return view('users.show', $viewData);
    }
}
