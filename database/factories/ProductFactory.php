<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'category_id' => function () {
                return ProductCategory::inRandomOrder()->first()->id;
            },
            'name' => fake()->word(),
            'slug' => fake()->slug(),
            'thumb_image' => 'image.jpg',
            'short_description' => fake()->paragraph(2),
            'description' => fake()->paragraph(5),
            'price' => fake()->numberBetween(1000, 10000),
            'offer_price' => fake()->numberBetween(1000, 10000),
            'sku' => fake()->unique()->ean13(),
            'status' => 1,
            'show_at_home' => 0,
            'seo_title' => fake()->sentence(),
            'seo_description' => fake()->paragraph(2),
        ];
    }
}
