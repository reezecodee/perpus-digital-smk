<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        Application::create(
            [
                'id' => Str::uuid(),
                'nama_sekolah' => 'SMK Digital Informatika',
                'nama_perpustakaan' => 'Perpustakaan Digital Informatika',
                'email' => 'sipdsmk@sdi.ac.id',
                'telepon' => '081298897654',
                'keyword' => 'perpus, digital, smk',
                'website' => 'https://perpustakaandigitalsmk.web.id',
                'jam_buka' => '08:00',
                'jam_tutup' => '15:00',
                'hari_libur' => 'Minggu',
                'deskripsi' => 'Sistem Informasi Perpustakaan Digital SMK adalah layanana peminjaman buku secara online yang praktis digunakan dimana saja',
                'alamat' => 'Jl. Tanuwijaya, Kota Tasikmalaya',
                'favicon' => 'favicon_6847b835632aa.png',
                'logo_sekolah' => 'logo_sekolah_6847b83563985.png',
                'logo_perpus' => 'logo_perpus_6847b83563d87.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
