<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'id' => Str::uuid(),
            'username' => 'elfira205',
            'nip_nis' => '19230825',
            'nisn' => '23432432423',
            'nama' => 'Karina Elfira',
            'email' => 'elfira@elfira.com',
            'telepon' => '081298897305',
            'jk' => 'Perempuan',
            'password' => bcrypt('12345678'),
            'photo' => 'https://lh3.googleusercontent.com/a/AEdFTp6XXjHQFNDvo7zHYJwLJt9QpLX3LtN39kDG1YrekQ=s96-c',
            'status' => 'Aktif',
            'alamat' => 'Jl Raya Banjar - Sidaharja, Tambakreja, Lakbok, Ciamis, Jawa barat. 46385'
        ]);
        $admin->assignRole('Admin');

        $pustakawan = User::create([
            'id' => Str::uuid(),
            'username' => 'Harits25',
            'nip_nis' => '19230827',
            'nisn' => '23432432424',
            'nama' => 'Atyla Azfa Al Harits',
            'email' => 'harits@harits.com',
            'telepon' => '081298897307',
            'jk' => 'Laki-laki',
            'password' => bcrypt('12345678'),
            'photo' => 'https://lh3.googleusercontent.com/a/AEdFTp6XXjHQFNDvo7zHYJwLJt9QpLX3LtN39kDG1YrekQ=s96-c',
            'status' => 'Aktif',
            'alamat' => 'Jl Raya Banjar - Sidaharja, Tambakreja, Lakbok, Ciamis, Jawa barat. 46385'
        ]);
        $pustakawan->assignRole('Pustakawan');

        $peminjam = User::create([
            'id' => Str::uuid(),
            'username' => 'Ambasingh',
            'nip_nis' => '19230829',
            'nisn' => '23432432425',
            'nama' => 'Ambatukam ambaleon',
            'email' => 'amba@amba.com',
            'telepon' => '081298897309',
            'jk' => 'Laki-laki',
            'password' => bcrypt('12345678'),
            'photo' => 'https://lh3.googleusercontent.com/a/AEdFTp6XXjHQFNDvo7zHYJwLJt9QpLX3LtN39kDG1YrekQ=s96-c',
            'status' => 'Aktif',
            'alamat' => 'Jl Raya Banjar - Sidaharja, Tambakreja, Lakbok, Ciamis, Jawa barat. 46385'
        ]);
        $peminjam->assignRole('Peminjam');
    }
}
