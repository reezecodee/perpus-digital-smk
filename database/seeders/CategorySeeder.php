<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        Category::insert([
            [
                'id' => Str::uuid(),
                'nama_kategori' => 'Tutorial'
            ],
            [
                'id' => Str::uuid(),
                'nama_kategori' => 'Slice Of Life',
            ],
            [
                'id' => Str::uuid(),
                'nama_kategori' => 'Horor'
            ],
            [
                'id' => Str::uuid(),
                'nama_kategori' => 'Sains'
            ],
            [
                'id' => Str::uuid(),
                'nama_kategori' => 'Matematika'
            ],
            [
                'id' => Str::uuid(),
                'nama_kategori' => 'Komputer'
            ],
            [
                'id' => Str::uuid(),
                'nama_kategori' => 'Romance'
            ],
            [
                'id' => Str::uuid(),
                'nama_kategori' => 'Buku Paket'
            ],
            [
                'id' => Str::uuid(),
                'nama_kategori' => 'Kesenian'
            ],
        ]);
    }
}
