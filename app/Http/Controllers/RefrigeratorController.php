<?php


namespace App\Http\Controllers;


use App\Models\Refrigerator;
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
}
