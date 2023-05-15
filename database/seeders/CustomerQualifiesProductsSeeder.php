<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CustomerQualifiesProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $productIds = DB::table('products')->pluck('id')->toArray();
        $customerIds = DB::table('customers')->pluck('id')->toArray();

        foreach ($productIds as $productId) {
            foreach ($customerIds as $customerId) {
                DB::table('customer_qualifies_product')->insert([
                    'qualification' => $faker->numberBetween(1, 5),
                    'idproduct' => $productId,
                    'idcustomer' => $customerId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
