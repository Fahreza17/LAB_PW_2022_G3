<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'seller_id' => $this->faker->numberBetween(0, 10),
            'category_id' => $this->faker->numberBetween(0, 10),
            'description' => $this->faker->text,
            // 'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
