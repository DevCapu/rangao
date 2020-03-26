<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FoodController extends Controller
{
    private const ROUTE_FOOD_CREATE = 'foods.create';

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('foods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $food = new Food();

        $food->name = $request->name;
        $food->base_qty = $request->base_qty;
        $food->base_unit = $request->base_unit;
        $food->calories = $request->calories;
        $food->category_id = $request->category_id;

        $food->save();

        return redirect()->route(self::ROUTE_FOOD_CREATE);
    }
}
