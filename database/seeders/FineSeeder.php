<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Fine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        $books = Book::where('format', 'Fisik')->get();

        foreach ($books as $item) {
            Fine::create([
                'id' => Str::uuid(),
                'buku_id' => $item->id,
                'denda_terlambat' => 10000,
                'denda_rusak' => 30000,
                'denda_tidak_kembali' => 30000,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
