<?php

namespace Database\Factories;

use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->word(),
            'description' => $this->faker->optional->text(150),
            'information' => $this->faker->optional->text(50),
            'manufacturer_id' => Manufacturer::select('id')
            ->orderByRaw('RAND()')
            ->first()->id,
            
            'created_at' => $this->faker->dateTimeBetween(
                '- 8 weeks',
                '- 4 weeks',
            ),
            'updated_at' => $this->faker->dateTimeBetween(
                '- 4 weeks',
                '- 1 week',
            ),
            'deleted_at' => rand(0,10) === 0
                ? $this->faker->dateTimeBetween(
                    '-1 week',
                    '+ 2 weeks',
                )
                : null
        ];
    }
}
