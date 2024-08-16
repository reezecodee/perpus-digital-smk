<?php

namespace App\Imports;

use App\Http\Requests\MasterData\ImportUserRequest;
use App\Http\Requests\MasterData\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class UsersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */


    public function model(array $row)
    {
        $import_request = new ImportUserRequest();
        $validator = Validator::make($row, $import_request->rules(), $import_request->messages());

        if ($validator->fails()) {
            session()->push('import_errors', [
                'errors' => $validator->errors()->all(),
                'row' => $row
            ]);

            return null;
        }

        $user = new User([
            'username' => $row['username'],
            'nip_nis' => $row['nip_nis'],
            'nama' => $row['nama'],
            'email' => $row['email'],
            'telepon' => $row['telepon'],
            'jk' => $row['jk'],
            'password' => bcrypt($row['password']),
            'status' => $row['status'],
            'alamat' => $row['alamat'],
        ]);

        $user->assignRole(ucfirst(strtolower($row['role'])));

        return $user;
    }
}
