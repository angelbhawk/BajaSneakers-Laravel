<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('products')->insert([
                'name' => $faker->word,
                'price' => $faker->randomFloat(2, 10, 1000),
                'color' => $faker->colorName,
                'brand' => $faker->company,
                'description' => $faker->sentence,
                'gender' => $faker->randomElement(['Masculino', 'Femenino']),
                'type' => $faker->randomElement(['Running', 'Basketball', 'Tennis', 'Skateboarding', 'Casual', 'Hiking']),
                'discount' => $faker->optional(0.3)->randomFloat(2, 0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
