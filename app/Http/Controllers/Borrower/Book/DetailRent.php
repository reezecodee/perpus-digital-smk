<?php

namespace App\Http\Controllers\Borrower\Book;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorHTML;

class DetailRent extends Controller
{
    private function get_barcode($data, $widthFactor = 2, $height = 30)
    {
        $generatorHTML = new BarcodeGeneratorHTML();
        return $generatorHTML->getBarcode("$data", $generatorHTML::TYPE_CODE_128, $widthFactor, $height);
    }

    public function show_detail_rent($id)
    {
        $borrower = Loan::find($id);

        if (!$borrower || $borrower->status == 'E-book') {
            abort(404);
        }

        return view('borrower-pages.book.loan-detail', [
            'title' => 'Detail Peminjaman',
            'data' => $borrower,
            'barcode' => function ($data, $widthFactor = 2, $height = 30) {
                return $this->get_barcode($data, $widthFactor, $height);
            }
        ]);
    }
}
