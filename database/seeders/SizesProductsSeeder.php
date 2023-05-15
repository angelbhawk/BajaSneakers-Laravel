<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class SizesProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $productIds = DB::table('products')->pluck('id')->toArray();

        foreach ($productIds as $productId) {
            $sizes = ['22', '23', '24', '25', '26', '27', '28', '29', '30'];
            
            foreach ($sizes as $size) {
                DB::table('sizes_products')->insert([
                    'idproduct' => $productId,
                    'size' => $size,
                    'stock' => $faker->numberBetween(0, 100),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
