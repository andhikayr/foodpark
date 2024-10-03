<?php

namespace Database\Seeders;

use App\Models\SectionTitle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WhyChooseUsTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SectionTitle::insert([
            [
                'key' => 'why_choose_us_title',
                'value' => 'Why Choose Us'
            ], [
                'key' => 'why_choose_us_sub_title',
                'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ], [
                'key' => 'why_choose_us_description',
                'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ]
        ]);
    }
}
