<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('customers')->insert([
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('123'),
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'gender' => $faker->randomElement(['Masculino', 'Femenino']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
