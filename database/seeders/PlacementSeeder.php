<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Placement;
use App\Models\Shelf;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PlacementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        $books = Book::where('format', 'Fisik')->get();

        foreach ($books as $item) {
            Placement::create(
                [
                    'id' => Str::uuid(),
                    'rak_id' => self::getShelfIDByCode('B01'),
                    'buku_id' => $item->id,
                    'jumlah_buku' => 10,
                    'buku_saat_ini' => 10,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }

    private static function getShelfIDByCode($code)
    {
        $shelf = Shelf::where('kode', $code)->first();

        return $shelf->id;
    }
}
