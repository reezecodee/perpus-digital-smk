<?php

namespace Database\Seeders;

use App\Models\Carousel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        Carousel::insert([
            [
                'id' => Str::uuid(),
                'carousel_file' => '6847b8474d3b3.png',
                'urutan' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'carousel_file' => '6847b851753e5.png',
                'urutan' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
