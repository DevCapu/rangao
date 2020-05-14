<?php


namespace App\Http\Controllers;


use App\Http\Requests\SaveFoodInsideRefrigeratorRequest;
use App\Models\FoodRefrigerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefrigeratorController
{

    public function index()
    {
        $foods = Auth::user()->refrigerator->foods;
        return view('refrigerator.index', [
            'foods' => $foods,
            'userId' => Auth::id()
        ]);
    }

    public function create()
    {
        return view('refrigerator.create');
    }

    public function store(SaveFoodInsideRefrigeratorRequest $request, FoodRefrigerator $foodRefrigerator)
    {
        $foodRefrigerator->food_id = $request->food;
        $foodRefrigerator->refrigerator_id = Auth::user()->refrigerator->id;
        $foodRefrigerator->quantity = $request->quantity;
        $foodRefrigerator->expiration_date = $request->expiration_date;
        $foodRefrigerator->notification = $request->notification;

        $foodRefrigerator->save();

        return redirect()->route('refrigerator.index');
    }
}
