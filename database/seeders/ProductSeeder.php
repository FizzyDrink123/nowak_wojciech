<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();
        Product::factory()
            ->count(20)
            ->create()
            ->each(function ($product) use ($categories) {
                $product->categories()->attach(
                    $categories->random(rand(1,3))
                        ->pluck('id')
                        ->toArray()
                );
            });
    }
}
