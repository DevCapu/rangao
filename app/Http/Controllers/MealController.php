<?php


namespace App\Http\Controllers;


use App\Services\IngestedFood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MealController extends Controller
{
    public function index()
    {
        return view('meals.create', ['id' => Auth::id()]);
    }

    public function store(Request $request, IngestedFood $ingestedFood)
    {
        foreach ($request->ingestedFoods as $food) {
            $food = json_decode(json_encode($food));
            $ingestedFood->saveIngestedFood($food, $request->id);
        }
    }

}
