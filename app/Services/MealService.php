<?php


namespace App\Services;


use App\Models\User;
use Carbon\Carbon;

class MealService
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

    public function getUserMeals(int $userId): array
    {
        $foodsEatenToday = $this->searchTodaysIngestedFood($userId);
        $this->sortFoodByPeriod($foodsEatenToday);

        return [$this->breakfast, $this->lunch, $this->afternoonCoffee, $this->dinner];
    }

    private function searchTodaysIngestedFood(int $id)
    {
        return User::find($id)->ingested->where('date', Carbon::now('America/Sao_Paulo')->format('d/m/y'));
    }

    private function sortFoodByPeriod($foodsEaten): void
    {
        foreach ($foodsEaten as $ingested) {
            $this->insereNaListaDoPeriodo($ingested);
        }
    }

    private function insereNaListaDoPeriodo($ingested): void
    {
        switch ($ingested->period) {
            case "CAFÉ DA MANHÃ":
                $this->breakfast[] = $ingested->food->name;
                break;
            case "ALMOÇO":
                $this->lunch[] = $ingested->food->name;
                break;
            case "CAFÉ DA TARDE":
                $this->afternoonCoffee[] = $ingested->food->name;
                break;
            case "JANTAR":
                $this->dinner[] = $ingested->food->name;
                break;
        }
    }

    public function calculatesMaximumNumberOfLinesOfTheMenu(array $menu):int
    {

        $max = 0;
        foreach ($menu as $meal) {
            $max = (count($meal) > $max) ? count($meal) : $max;
        }
        return $max;
    }
}
