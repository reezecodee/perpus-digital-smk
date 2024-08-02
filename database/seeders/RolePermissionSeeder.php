<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'chat bantuan',
            'manajemen pengguna_internal',
            'manajemen peminjam',
            'manajemen rak',
            'manajemen kategori',
            'manajemen buku',
            'manajemen peminjaman',
            'manajemen kunjungan',
            'manajemen denda',
            'manajemen perpustakaan',
            'manajemen aplikasi',
            'manajemen notifikasi',
            'manajemen email',
            'manajemen artikel',
            'manajemen kelender',
            'generate laporan',
            'akses penuh peminjam'
        ];

        foreach($permissions as $permission){
            ModelsPermission::create(['name' => $permission]);
        }

        $admin_role = Role::create(['name' => 'Admin']);
        $librarian_role = Role::create(['name' => 'Pustakawan']);
        $borrower_role = Role::create(['name' => 'Peminjam']);

        $admin_role->givePermissionTo(ModelsPermission::all());
        $librarian_role->givePermissionTo([
            'chat bantuan',
            'manajemen peminjam',
            'manajemen rak',
            'manajemen kategori',
            'manajemen buku',
            'manajemen peminjaman',
            'manajemen kunjungan',
            'manajemen denda',
            'manajemen notifikasi',
            'manajemen artikel',
            'manajemen kelender',
            'generate laporan',
        ]);
        $borrower_role->givePermissionTo(['akses penuh peminjam']);
    }
}
