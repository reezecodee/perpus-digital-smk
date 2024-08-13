<?php

namespace App\Http\Controllers\Pustakawan\MasterDataPengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogicUserController extends Controller
{
    public function logic_import_admin(Request $request)
    {
        $data = $request->input('data');
        // dd($data);

        // Proses dan simpan data ke database atau lakukan operasi lainnya
        // foreach ($data as $row) {
        //     // Logika penyimpanan data
        // }

        return response()->json(['message' => 'Data successfully uploaded']);
    }
}
