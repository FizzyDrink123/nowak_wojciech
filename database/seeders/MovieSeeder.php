<?php

namespace Database\Seeders;


use App\Models\Movie;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();
        Movie::factory()
            ->count(20)
            ->create()
            ->each(function ($movie) use ($categories) {
                $movie->categories()->attach(
                    $categories->random(rand(1,3))
                        ->pluck('id')
                        ->toArray()
                );
            });
    }
}
