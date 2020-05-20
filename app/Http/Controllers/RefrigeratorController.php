<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveFoodInsideRefrigeratorRequest;
use App\Models\Food;
use App\Services\InsertFoodInsideRefrigerator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RefrigeratorController
{

    public function index()
    {
        $foods = Auth::user()->refrigerator->foods()->wherePivot('expiration_date', '>', Carbon::now('America/Sao_Paulo')->format('d/m/y'))->get();
        return view('refrigerator.index', [
            'foods' => $foods,
            'userId' => Auth::id()
        ]);
    }

    public function create()
    {
        return view('refrigerator.create');
    }

    public function store(SaveFoodInsideRefrigeratorRequest $request, InsertFoodInsideRefrigerator $insertFoodInsideRefrigerator)
    {
        $foodInsideRefrigeratorWithRequestId = (Auth::user()->refrigerator->foods()->where('food_id', $request->food)->first());
        $isFoodAlreadyInTheRefrigerator = $foodInsideRefrigeratorWithRequestId != null;

        if ($isFoodAlreadyInTheRefrigerator) {
            $insertFoodInsideRefrigerator->updateFood($request, $foodInsideRefrigeratorWithRequestId);
        } else {
            $insertFoodInsideRefrigerator->saveFoodInsideTheRefrigerator($request);
        }

        return redirect()->route('refrigerator.index');
    }

    public function edit(Food $foodId)
    {
        $food = (Auth::user()->refrigerator->foods()->where('food_id', $foodId->id)->first());
        return view('refrigerator.edit', ['food' => $food]);
    }
}
