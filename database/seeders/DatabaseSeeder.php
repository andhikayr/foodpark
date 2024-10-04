<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Slider;
use App\Models\WhyChooseUs;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            WhyChooseUsTitleSeeder::class,
            ProductCategorySeeder::class
        ]);
        Slider::factory(3)->create();
        WhyChooseUs::factory(3)->create();
        Product::factory(5)->create();
    }
}
