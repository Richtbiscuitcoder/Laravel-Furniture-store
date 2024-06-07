<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),
            'width' => $this->faker->randomDigit(),
            'height' => $this->faker->randomDigit(),
            'depth' => $this->faker->randomDigit(),
            'price' => $this->faker->randomDigit(),
            'stock' => $this->faker->randomDigit(),
            'related' => $this->faker->randomDigit(),
            'color' => $this->faker->colorName(),
        ];
    }
}
