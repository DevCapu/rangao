<?php


namespace App\Services;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class IngestedFood
{
    private array $breakfast;
    private array $lunch;
    private array $afternoonCoffee;
    private array $dinner;

    public function __construct()
    {
        $this->breakfast = [];
        $this->lunch = [];
        $this->afternoonCoffee = [];
        $this->dinner = [];
    }

    public function getMeals()
    {
        return [
            $this->breakfast,
            $this->lunch,
            $this->afternoonCoffee,
            $this->dinner
        ];
    }

    /**
     * @param int $userId
     * @return array
     */
    public function getTodayIngestedFood(int $userId): array
    {
        $this->searchUserIngestedFoodToday($userId);

        return [
            $this->breakfast,
            $this->lunch,
            $this->afternoonCoffee,
            $this->dinner
        ];
    }

    private function searchUserIngestedFoodToday(int $userId)
    {
        $today = Carbon::now('America/Sao_Paulo')->format('d/m/Y');
        $ingestedFood = User::find($userId)->ingested->where('date', $today);
        $this->sortFoodByMeal($ingestedFood);
    }

    private function sortFoodByMeal(Collection $ingested)
    {
        foreach ($ingested as $ingested) {
            $this->addFoodOnMealGroup($ingested);
        }
    }

    private function addFoodOnMealGroup($ingested)
    {
        switch ($ingested->period) {
            case 'BREAKFAST':
                array_push($this->breakfast, $ingested->food);
                break;
            case 'LUNCH':
                array_push($this->lunch, $ingested->food);
                break;
            case 'AFTERNOON_COFFEE':
                array_push($this->afternoonCoffee, $ingested->food);
                break;
            case 'DINNER':
                array_push($this->dinner, $ingested->food);
                break;
            default:
                throw new \InvalidArgumentException("We don't expect $ingested->period as an argument");
                break;
        }
    }

    public function getRows()
    {
        $meals = $this->getMeals();
        $max = -INF;
        foreach ($meals as $meal) {
            $max = (count($meal) > $max) ? count($meal) : $max;
        }
        return $max;
    }
}
