<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        RolePermissionSeeder::run();
        UserSeeder::run();
        CategorySeeder::run();
        BookSeeder::run();
        CarouselSeeder::run();
        ShelfSeeder::run();
        PlacementSeeder::run();
        ApplicationSeeder::run();
        FineSeeder::run();
    }
}
