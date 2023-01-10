<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'invoiceNo'=>$this->faker->unique()->word(20),
            'orderDate' => $this->faker->dateTimeBetween(
                '+ 1 week',
                '+ 2 weeks',
        ),
            'email'=>$this->faker->unique()->word(20),
            'fullName'=>$this->faker->unique()->word(20),
            'address'=>$this->faker->unique()->word(20),
            'phoneNumber'=>$this->faker->unique()->word(20),
            'city'=>$this->faker->unique()->word(20),
            'product'=>$this->faker->unique()->word(20),
            'price'=>$this->faker->randomFloat(2,10,100),
            'qunatity'=>$this->faker->randomFloat(0,1,10),
            'totalPrice'=>$this->faker->randomFloat(2,10,100),
            'created_at'=>$this->faker->dateTimeBetween(
                '- 8 weeks',
                '- 4 weeks',
            ),
            'updated_at'=>$this->faker->dateTimeBetween(
                '- 4 weeks',
                '- 1 week',
            ),

        ];
    }
}
