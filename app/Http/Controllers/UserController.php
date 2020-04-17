<?php


namespace App\Http\Controllers;

use App\Adapters\EnergeticNeeds;
use App\Http\Requests\StoreUser;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

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
        User::create($userDictionary);

        return redirect()->route('profile');
    }
}
