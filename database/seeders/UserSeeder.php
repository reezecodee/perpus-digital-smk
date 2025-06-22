<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        $admin = User::create([
            'id' => Str::uuid(),
            'username' => 'karina205',
            'nip_nis' => '19230825',
            'nisn' => null,
            'nama' => 'Karina Putri',
            'email' => 'karina@gmail.com',
            'telepon' => '081298897305',
            'jk' => 'Perempuan',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
            'status' => 'Aktif',
            'alamat' => 'Jl Raya Banjar - Sidaharja, Tambakreja, Lakbok, Ciamis, Jawa barat. 46385',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $admin->assignRole('Admin');

        $librarian = User::create([
            'id' => Str::uuid(),
            'username' => 'hendri123',
            'nip_nis' => '19230826',
            'nisn' => null,
            'nama' => 'Hendri Mardani',
            'email' => 'hendri@gmail.com',
            'telepon' => '081298897306',
            'jk' => 'Laki-laki',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
            'status' => 'Aktif',
            'alamat' => 'Jl Raya Banjar - Sidaharja, Tambakreja, Lakbok, Ciamis, Jawa barat. 46385',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $librarian->assignRole('Pustakawan');

        $student1 = User::create([
            'id' => Str::uuid(),
            'username' => 'alharits25',
            'nip_nis' => '19230827',
            'nisn' => '1923089921',
            'nama' => 'Atyla Azfa Al Harits',
            'email' => 'azfaalharits25@gmail.com',
            'telepon' => '081298897307',
            'jk' => 'Laki-laki',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
            'status' => 'Aktif',
            'alamat' => 'Jl Raya Banjar - Sidaharja, Tambakreja, Lakbok, Ciamis, Jawa barat. 46385',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $student1->assignRole('Siswa');

        $student2 = User::create([
            'id' => Str::uuid(),
            'username' => 'azzam012',
            'nip_nis' => '19230828',
            'nisn' => '1923089922',
            'nama' => 'Abdullah Azzam',
            'email' => 'azzam@gmail.com',
            'telepon' => '081298897308',
            'jk' => 'Laki-laki',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
            'status' => 'Aktif',
            'alamat' => 'Jl Raya Banjar - Sidaharja, Tambakreja, Lakbok, Ciamis, Jawa barat. 46385',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $student2->assignRole('Siswa');
    }
}
