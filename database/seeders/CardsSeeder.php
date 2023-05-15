<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $customerIds = DB::table('customers')->pluck('id')->toArray();
        $addressIds = DB::table('addresses')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            DB::table('cards')->insert([
                'cardnumber' => $faker->creditCardNumber,
                'customerid' => $faker->randomElement($customerIds),
                'addressid' => $faker->randomElement($addressIds),
                'cardholder' => $faker->name,
                'validity' => $faker->creditCardExpirationDate,
                'code' => $faker->randomNumber(3),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
