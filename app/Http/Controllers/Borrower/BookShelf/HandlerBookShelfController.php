<?php

namespace App\Http\Controllers\Borrower\BookShelf;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rating\RatingRequest;
use App\Models\Loan;
use App\Models\Review;
use Illuminate\Http\Request;

class HandlerBookShelfController extends Controller
{
    /**
     * Function ini digunakan untuk menambahkan otomatis ke DB loan ketika user mulai membaca E-book.
     * 
     */

    public function updateEbook(Request $request, $id)
    {
        $request->validate([
            'e_book' => 'required|in:tambah,hapus',
        ]);

        $userId = $this->user->id;

        if ($request->e_book === 'tambah') {
            return $this->addEBookToLoan($id, $userId);
        }

        if ($request->e_book === 'hapus') {
            return $this->removeEBookFromLoan($id, $userId);
        }

        return back();
    }


    /**
     * Tambahkan ke Database Loan.
     * @param $bookId -> berisi ID buku
     * @param $borrowerId -> berisi ID user saat ini
     */

    private function addEBookToLoan($bookId, $borrowerId)
    {
        $loan = Loan::firstOrCreate([
            'buku_id' => $bookId,
            'peminjam_id' => $borrowerId,
            'kode_peminjaman' => str_pad(mt_rand(0, 999999999999), 12, '0', STR_PAD_LEFT),
            'status' => 'E-book',
            'keterangan_denda' => 'Tidak ada',
        ]);

        $this->log("Membaca e-book {$loan->book->judul}");
        return redirect('/baca-e-book/' . $bookId);
    }


    /**
     * Hapus E-book dari Database Loan.
     * @param $bookId -> berisi ID buku
     * @param $borrowerId -> berisi ID user saat ini
     */

    private function removeEBookFromLoan($bookId, $borrowerId)
    {
        $loan = Loan::where('buku_id', $bookId)
            ->where('peminjam_id', $borrowerId)
            ->first();

        if ($loan) {
            $this->log("Menghapus e-book {$loan->book->judul} dari daftar baca");
            $loan->delete();
        }

        return back();
    }


    /**
     * Function ini digunakan untuk menghapus E-book.
     * @param $id -> berisi ID buku
     */

    public function deleteEbook($id)
    {
        $userId = $this->user->id;

        $loan = Loan::where('buku_id', $id)
            ->where('peminjam_id', $userId)
            ->delete();

        $this->log("Menghapus e-book {$loan->book->judul} dari daftar baca");
        return back()->withSuccess('Buku berhasil menghapus e-book');
    }


    /**
     * Function ini digunakan untuk mengirimkan komentar review buku.
     * @param $id -> berisi ID peminjaman
     */

    public function sendComment(RatingRequest $request, $id)
    {
        $validatedData = $request->validated();
        $loan = Loan::findOrFail($id);
        $loan->update(['status' => 'Sudah diulas']);

        $validatedData['peminjaman_id'] = $loan->id;
        Review::create($validatedData);

        $this->log("{$loan->peminjam->nama} memberikan komentar untuk buku \"{$loan->book->judul}\"");
        return back()->withSuccess('Berhasil memberikan komentar');
    }


    /**
     * Function ini digunakan untuk menghapus komentar review buku.
     * @param $id -> berisi ID review
     */

    public function deleteComment($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        $loan = Loan::find($review->loan->id);
        $loan->update(['status' => 'Sudah dikembalikan']);

        $this->log("{$review->borrower->nama} menghapus komentarnya terhadap buku \"{$review->book->judul}\"");
        return back()->withSuccess('Berhasil menghapus komentar buku');
    }
}
