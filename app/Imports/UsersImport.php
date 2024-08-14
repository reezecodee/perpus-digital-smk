<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            // Mengasumsikan bahwa baris pertama adalah header
            $header = $collection->shift();

            // Mengubah koleksi menjadi array asosiatif dengan header sebagai kunci
            $data = $row->combine($header)->toArray();

            // Menyimpan data ke database
            $user = User::updateOrCreate(
                ['email' => $data['email']], // Menentukan unique key (email)
                [
                    'username' => $data['username'],
                    'nip_nis' => $data['nip_nis'],
                    'nama' => $data['nama'],
                    'email' => $data['email'],
                    'telepon' => $data['telepon'],
                    'jk' => $data['jk'],
                    'password' => bcrypt($data['password']),
                    'status' => $data['status'],
                    'alamat' => $data['alamat'],
                ]
            );

            $user->assignRole('Admin');
        }
    }
}
