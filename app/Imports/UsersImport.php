<?php

namespace App\Imports;

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
        $validator = Validator::make($row, $this->rules(), $this->messages());

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

    public function rules()
    {
        return [
            'username' => 'required|unique:users,username|min:7|max:15',
            'nama' => 'required|min:5|max:255',
            'nip_nis' => 'required|min:10|max:18|unique:users,nip_nis',
            'telepon' => 'required|min:12|max:15|unique:users,telepon',
            'email' => 'required|email|min:8|max:255|unique:users,email',
            'jk' => 'required|in:Laki-laki,Perempuan',
            'password' => 'required|min:8',
            'alamat' => 'required|max:200',
            'status' => 'required|in:Aktif,Non-aktif',
            'image' => 'nullable|string',
            'nisn' => 'nullable|min:10|max:10|unique:users,nisn'
        ];
    }

    public function messages() 
    {
        return [
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan, silakan pilih yang lain.',
            'username.min' => 'Username harus memiliki minimal 7 karakter.',
            'username.max' => 'Username maksimal hanya 15 karakter.',
            
            'nama.required' => 'Nama wajib diisi.',
            'nama.min' => 'Nama harus memiliki minimal 5 karakter.',
            'nama.max' => 'Nama maksimal hanya 255 karakter.',
            
            'nip_nis.required' => 'NIP/NIS wajib diisi.',
            'nip_nis.min' => 'NIP/NIS harus memiliki minimal 10 karakter.',
            'nip_nis.max' => 'NIP/NIS maksimal hanya 18 karakter.',
            'nip_nis.unique' => 'NIP/NIS sudah digunakan, silakan pilih yang lain.',
            
            'telepon.required' => 'Nomor telepon wajib diisi.',
            'telepon.min' => 'Nomor telepon harus memiliki minimal 12 karakter.',
            'telepon.max' => 'Nomor telepon maksimal hanya 15 karakter.',
            'telepon.unique' => 'Nomor telepon sudah digunakan, silakan pilih yang lain.',
            
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.min' => 'Email harus memiliki minimal 8 karakter.',
            'email.max' => 'Email maksimal hanya 255 karakter.',
            'email.unique' => 'Email sudah digunakan, silakan pilih yang lain.',
            
            'jk.required' => 'Jenis kelamin wajib dipilih.',
            'jk.in' => 'Jenis kelamin harus salah satu dari: Laki-laki atau Perempuan.',
            
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password harus memiliki minimal 8 karakter.',
            
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.max' => 'Alamat maksimal hanya 200 karakter.',
            
            'status.required' => 'Status wajib dipilih.',
            'status.in' => 'Status harus salah satu dari: Aktif atau Non-aktif.',
            
            'image.string' => 'Gambar profil harus berupa string.',

            'nisn.min' => 'NISN harus memiliki minimal 10 karakter.',
            'nisn.max' => 'NISN tidak boleh lebih dari 10 karakter.',
            'nisn.unique' => 'NISN sudah digunakan.',
        ];        
    }
}
