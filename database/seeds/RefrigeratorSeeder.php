<?php

use App\Models\Refrigerator;
use Illuminate\Database\Seeder;

class RefrigeratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Refrigerator::create([
            'user_id' => 1
        ]);
    }
}
