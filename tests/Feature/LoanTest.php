<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Loan;
use App\Models\Placement;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoanTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_borrow_a_book()
    {
        $user = User::factory()->create();

        $book = Book::where('format', 'Fisik')->first();
        $placement = Placement::where('buku_id', $book->id)->first();

        // Simulasi peminjaman buku
        $code = uniqid();
        $loan = Loan::create([
            'peminjam_id' => $user->id,
            'buku_id' => $book->id,
            'penempatan_id' => $book->placement->id,
            'kode_peminjaman' => $code,
            'peminjaman' => null,
            'pengembalian' => null,
            'jatuh_tempo' => null,
            'keterangan' => null,
            'status' => 'Menunggu persetujuan',
            'keterangan_denda' => 'Tidak ada',
        ]);

        // Update stok buku
        $placement->decrement('buku_saat_ini');

        // Assert → cek apakah loan tercatat
        $this->assertDatabaseHas('loans', [
            'peminjam_id' => $user->id,
            'buku_id' => $book->id,
            'penempatan_id' => $book->placement->id,
            'kode_peminjaman' => $code,
            'peminjaman' => null,
            'pengembalian' => null,
            'jatuh_tempo' => null,
            'keterangan' => null,
            'status' => 'Menunggu persetujuan',
            'keterangan_denda' => 'Tidak ada',
        ]);

        // Assert → cek apakah stok buku berkurang
        $this->assertEquals(4, $placement->fresh()->buku_saat_ini);
    }
}
