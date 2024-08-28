<?php

namespace App\Http\Controllers\Peminjam\Book;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\Review;
use Illuminate\Http\Request;

class BookShelf extends Controller
{
    public function show_my_shelf()
    {
        $excluded_statuses = ['Sudah dikembalikan', 'Sudah dibayar', 'Sudah diulas'];
        $books = Loan::where('peminjam_id', auth()->user()->id)
            ->whereNotIn('status', $excluded_statuses)
            ->whereHas('book', function ($query) {
                $query->where('format', 'Fisik');
            })->with('book')->get();

        $e_books = Loan::where('peminjam_id', auth()->user()->id)
            ->whereHas('book', function ($query) {
                $query->where('format', 'Elektronik');
            })->with('book')->get();

        $for_reviews = Loan::where('peminjam_id', auth()->user()->id)->where('status', 'Sudah dikembalikan')->get();

        return view('peminjam_views.buku.rak-buku', [
            'title' => 'Rak Buku Saya',
            'books' => $books,
            'e_books' => $e_books,
            'for_reviews' => $for_reviews,
            'reviews' => Review::where('peminjam_id', auth()->user()->id)->get(),
            'barcode' => function ($data, $widthFactor = 2, $height = 30) {
                return $this->get_barcode($data, $widthFactor, $height);
            },
        ]);
    }

    // Logical Backend Here

    public function update_e_book(Request $request, $id)
    {
        $request->validate([
            'e_book' => 'required|in:tambah,hapus',
        ]);

        $peminjamId = auth()->user()->id;

        if ($request->e_book == 'tambah') {
            $credentials = [
                'buku_id' => $id,
                'peminjam_id' => $peminjamId,
                'kode_peminjaman' => str_pad(mt_rand(0, 999999999999), 12, '0', STR_PAD_LEFT),
                'status' => 'E-book',
                'keterangan_denda' => 'Tidak ada',
            ];

            $loan = Loan::firstOrCreate($credentials);
            $this->log("Membaca e-book {$loan->book->judul}");
            return redirect('/baca-e-book/' . $id);
        } else if ($request->e_book == 'hapus') {
            $loan = Loan::where('buku_id', $id)
                ->where('peminjam_id', $peminjamId)
                ->first();

            if ($loan) {
                $this->log("Menghapus e-book {$loan->book->judul} dari daftar baca");
                $loan->delete();
                return back();
            }
        }

        return back();
    }

    public function delete_e_book($id)
    {
        $peminjamId = auth()->user()->id;

        $loan = Loan::where('buku_id', $id)
            ->where('peminjam_id', $peminjamId)
            ->delete();

        $this->log("Menghapus e-book {$loan->book->judul} dari daftar baca");
        return back()->withSuccess('Buku berhasil menghapus e-book');
    }
}
