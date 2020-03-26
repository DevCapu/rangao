<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Felipe Moreno Borges",
            "birthday" => "15/10/2000",
            "gender" => "male",
            "objective" => "lose",
            "email" => "admin@gmail.com",
            "password" => Hash::make("admin1234"),
            "height" => 1.78,
            "weight" => 76.15,
            "activity" => 'littleActive',
            "basalEnergyExpenditure" => 1022.60,
            "totalEnergyExpenditure" => 1533.90,
            "caloriesToCommitObjective" => 1181.10,
            "photo" => ""
        ]);
    }
}
