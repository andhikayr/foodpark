<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'sub_title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(2),
            'image' => 'image.png',
            'offer' => '50',
            'button_link' => $this->faker->url(),
            'status' => $this->faker->boolean(),
        ];
    }
}
