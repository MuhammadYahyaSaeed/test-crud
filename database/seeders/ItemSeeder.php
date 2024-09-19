<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ItemSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('items')->insert([
                'name' => $faker->word,
                'price' => $faker->randomFloat(2, 1, 100),
                'description' => $faker->sentence,
            ]);
        }
    }
}
