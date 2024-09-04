<?php

namespace App\Http\Controllers\Borrower\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rating\RatingRequest;
use App\Models\Loan;
use App\Models\Review;
use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorHTML;

class BookShelf extends Controller
{
    private function get_barcode($data, $widthFactor = 2, $height = 30)
    {
        $generatorHTML = new BarcodeGeneratorHTML();
        return $generatorHTML->getBarcode("$data", $generatorHTML::TYPE_CODE_128, $widthFactor, $height);
    }

    public function show_my_shelf()
    {
        $excluded_statuses = ['Sudah dikembalikan', 'Sudah dibayar', 'Sudah diulas'];

        $books = Loan::with(['placement.book'])
            ->where('peminjam_id', auth()->user()->id)
            ->whereNotIn('status', $excluded_statuses)
            ->whereHas('placement.book', function ($query) {
                $query->where('format', 'Fisik');
            })
            ->get();


        $e_books = Loan::with(['placement.book'])
            ->where('peminjam_id', auth()->user()->id)
            ->whereHas('placement.book', function ($query) {
                $query->where('format', 'Elektronik');
            })
            ->get();


        $for_reviews = Loan::with(['placement.book'])
            ->where('peminjam_id', auth()->user()->id)
            ->where('status', 'Sudah dikembalikan')
            ->get();


        return view('borrower-pages.book.book-shelf', [
            'title' => 'Rak Buku Saya',
            'books' => $books,
            'e_books' => $e_books,
            'for_reviews' => $for_reviews,
            'reviews' => Review::with('borrower_review')->where('peminjam_id', auth()->user()->id)->get(),
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

    public function send_comment(RatingRequest $request, $id)
    {
        $validated_data = $request->validated();
        $loan = Loan::findOrFail($id);
        $loan->update(['status' => 'Sudah diulas']);

        $validated_data['peminjaman_id'] = $loan->id;
        Review::create($validated_data);
        $this->log("{$loan->peminjam->nama} memberikan komentar untuk buku \"{$loan->book->judul}\"");
        return back()->withSuccess('Berhasil memberikan komentar');
    }

    public function delete_comment($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        $loan = Loan::find($review->loan->id);
        $loan->update(['status' => 'Sudah dikembalikan']);
        $this->log("{$review->borrower_review->nama} menghapus komentarnya terhadap buku \"{$review->book->judul}\"");

        return back()->withSuccess('Berhasil menghapus komentar buku');
    }
}
