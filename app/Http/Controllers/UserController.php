<?php


namespace App\Http\Controllers;

use App\Adapters\EnergeticNeeds;
use App\Http\Requests\StoreUser;
use App\Models\User;
use App\Services\IngestedFood;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController
{

    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUser $request, EnergeticNeeds $energeticNeeds): RedirectResponse
    {
        $energeticNeeds->calculate($request);
        $userDictionary = $this->userService->fillUser($request, $energeticNeeds);
        $user = User::create($userDictionary);
        Auth::login($user);
        return redirect()->route('profile', ['user' => $user->id]);
    }

    public function profile(User $user, IngestedFood $ingestedFood)
    {
        $todayIngestedFood = $ingestedFood->getTodayIngestedFood($user->id);
        return view(
            'users.profile',
            [
                'user' => $user,
                'ingested' => $todayIngestedFood,
                'rows' => $ingestedFood->getRows()
            ]
        );
    }

    public function edit()
    {
        return view('users.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request, EnergeticNeeds $energeticNeeds)
    {
        $energeticNeeds->calculate($request);
        $user = Auth::user();
        $user->name = $request->name;
        $user->weight = $request->weight;
        $user->height = $request->height;
        $user->birthday = $request->birthday;
        $user->objective = $request->objective;
        $user->activity = $request->activity;
        $user->basalEnergyExpenditure = $energeticNeeds->getBasalEnergyExpenditure();
        $user->totalEnergyExpenditure = $energeticNeeds->getTotalEnergyExpenditure();
        $user->caloriesToCommitObjective = $energeticNeeds->getCaloriesToCommitObjective();
        if ($request->hasFile('photo')) {
            $user->photo = $request->photo->store('public/img/users-profile/');
        }

        $user->save();

        return redirect(route('profile', ['user' => $user->id]));
    }
}
