<?php

namespace App\Imports;

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
        $validator = Validator::make($row, [
            'username' => 'required|unique:users,username|min:7|max:15',
            'nama' => 'required|min:5|max:255',
            'nip_nis' => 'required|min:10|max:15|unique:users,nip_nis',
            'telepon' => 'required|min:12|max:15|unique:users,telepon',
            'email' => 'required|email|min:8|max:255|unique:users,email',
            'jk' => 'required|in:Laki-laki,Perempuan',
            'password' => 'required|min:8',
            'alamat' => 'required|max:200',
            'status' => 'required|in:Aktif,Non-aktif',
        ]);

        if ($validator->fails()) {
            throw new \Exception('Data tidak valid: ' . implode(', ', $validator->errors()->all()));
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

        $user->assignRole('Admin');

        return $user;
    }
}
