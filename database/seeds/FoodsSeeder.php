<?php

use App\Models\Food;
use Illuminate\Database\Seeder;

class FoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/foods.json");
        $json = json_decode($json);

        foreach ($json->foods as $food) {
            Food::create([
                'name' => $food->name,
                'base_qty' => $food->base_qty,
                'base_unit' => $food->base_unit,
                'calories' => $food->calories,
                'category_id' => $food->category_id
            ]);
        }
    }
}
