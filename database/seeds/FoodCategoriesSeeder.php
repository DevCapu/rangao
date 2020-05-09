<?php

use App\Models\FoodCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class FoodCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/categories.json");
        $json = json_decode($json);

        foreach ($json as $category) {
            FoodCategory::create(['category' => $category->category]);
        }
    }
}
