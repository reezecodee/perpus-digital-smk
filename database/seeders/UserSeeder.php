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
            'username' => 'elfira205',
            'nip_nis' => '19230825',
            'nisn' => '23432432423',
            'nama' => 'Karina Elfira',
            'email' => 'elfira@elfira.com',
            'telepon' => '081298897305',
            'jk' => 'Perempuan',
            'password' => bcrypt('12345678'),
            'status' => 'Aktif',
            'alamat' => 'Jl Raya Banjar - Sidaharja, Tambakreja, Lakbok, Ciamis, Jawa barat. 46385'
        ]);
        $admin->assignRole('Admin');

        $pustakawanWithoutPermission = User::create([
            'id' => Str::uuid(),
            'username' => 'Harits25',
            'nip_nis' => '19230827',
            'nisn' => '23432432424',
            'nama' => 'Atyla Azfa Al Harits',
            'email' => 'harits@harits.com',
            'telepon' => '081298897307',
            'jk' => 'Laki-laki',
            'password' => bcrypt('12345678'),
            'status' => 'Aktif',
            'alamat' => 'Jl Raya Banjar - Sidaharja, Tambakreja, Lakbok, Ciamis, Jawa barat. 46385'
        ]);
        $pustakawanWithoutPermission->assignRole('Pustakawan');

        $pustakawanWithPermission = User::create([
            'id' => Str::uuid(),
            'username' => 'Reeze',
            'nip_nis' => '19230763',
            'nisn' => '832487324222',
            'nama' => 'Atyla Azfa Al Harits',
            'email' => 'reeze@reeze.com',
            'telepon' => '081298896969',
            'jk' => 'Laki-laki',
            'password' => bcrypt('12345678'),
            'status' => 'Aktif',
            'alamat' => 'Jl Raya Banjar - Sidaharja, Tambakreja, Lakbok, Ciamis, Jawa barat. 46385'
        ]);

        $pustakawanWithPermission->assignRole('Pustakawan');

        $siswa = User::create([
            'id' => Str::uuid(),
            'username' => 'Azfaal',
            'nip_nis' => '19230829',
            'nisn' => '23432432425',
            'nama' => 'Azfa Al',
            'email' => 'azfaalharits25@gmail.com',
            'telepon' => '081298897309',
            'jk' => 'Laki-laki',
            'password' => bcrypt('12345678'),
            'status' => 'Aktif',
            'alamat' => 'Jl Raya Banjar - Sidaharja, Tambakreja, Lakbok, Ciamis, Jawa barat. 46385'
        ]);
        $siswa->assignRole('Siswa');
    }
}
