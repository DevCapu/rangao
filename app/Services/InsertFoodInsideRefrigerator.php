<?php


namespace App\Services;


use App\Http\Requests\SaveFoodInsideRefrigeratorRequest;
use App\Models\FoodRefrigerator;
use Illuminate\Support\Facades\Auth;

class InsertFoodInsideRefrigerator
{
    public function __construct(FoodRefrigerator $foodRefrigerator)
    {
        $this->foodRefrigerator = $foodRefrigerator;
    }

    public function saveFoodInsideTheRefrigerator(SaveFoodInsideRefrigeratorRequest $request): void
    {
        $this->foodRefrigerator->food_id = $request->food;
        $this->foodRefrigerator->refrigerator_id = Auth::user()->refrigerator->id;
        $this->foodRefrigerator->quantity = $request->quantity;
        $this->foodRefrigerator->expiration_date = $request->expiration_date;
        $this->foodRefrigerator->notification = $request->notification;

        $this->foodRefrigerator->save();
    }

    public function updateFood(SaveFoodInsideRefrigeratorRequest $request, $food): void
    {
        $food->pivot->quantity = $request->quantity;
        $food->pivot->expiration_date = $request->expiration_date;
        $food->pivot->notification = $request->notification;
        $food->pivot->save();
        $food->saveOrFail();
    }
}
