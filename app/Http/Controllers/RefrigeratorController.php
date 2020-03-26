<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRefrigeratorRequest;
use App\Models\Refrigerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RefrigeratorController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        return view(
            'refrigerators.index',
            [
                'refrigerators' => Auth::user()->refrigerators,
                'userID' => Auth::id()
            ]
        );
    }

    public function create()
    {
        return view('refrigerators.create');
    }

    public function store(StoreRefrigeratorRequest $request)
    {
        $refrigerator = new Refrigerator();
        $refrigerator->quantity = $request->quantity;
        $refrigerator->food_id = $request->food;
        $refrigerator->expiration_date = $request->expiration;
        $refrigerator->notification = $request->notification;
        $refrigerator->user_id = Auth::id();
        $refrigerator->save();

        return view('refrigerators.create');
    }
}
