<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class AddressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        for ($i = 0; $i < 10; $i++) {
            DB::table('addresses')->insert([
                'country' => $faker->country,
                'state' => $faker->state,
                'city' => $faker->city,
                'neighborhood' => $faker->cityPrefix,
                'street1' => $faker->streetName,
                'street2' => $faker->optional()->secondaryAddress,
                'zip_code' => $faker->postcode,
                'house_number' => $faker->buildingNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
