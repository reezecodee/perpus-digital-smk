<?php

namespace Database\Seeders;

use App\Models\Shelf;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ShelfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        Shelf::insert(
            [
                [
                    'id' => Str::uuid(),
                    'nama_rak' => 'Fiksi & Sastra',
                    'kode' => 'A01',
                    'kapasitas' => 150,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => Str::uuid(),
                    'nama_rak' => 'Bisnis & Pengembangan Diri',
                    'kode' => 'B01',
                    'kapasitas' => 120,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => Str::uuid(),
                    'nama_rak' => 'Sejarah & Biografi',
                    'kode' => 'C01',
                    'kapasitas' => 100,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => Str::uuid(),
                    'nama_rak' => 'Sains & Teknologi',
                    'kode' => 'D01',
                    'kapasitas' => 110,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => Str::uuid(),
                    'nama_rak' => 'Referensi & Kamus',
                    'kode' => 'E01',
                    'kapasitas' => 80,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
