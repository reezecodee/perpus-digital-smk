<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
            'melayani chat',
            'manajemen user pustakawan',
            'manajemen peminjaman',
            'mengirim notifikasi',
            'mengatur jadwal perpustakaan',
            'manajemen user peminjam',
            'manajemen buku',
            'mengirim email',
            'generate laporan',
        ];

        foreach ($permissions as $permission) {
            ModelsPermission::create(['name' => $permission]);
        }

        $admin_role = Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Pustakawan']);
        Role::create(['name' => 'Peminjam']);

        $admin_role->givePermissionTo(ModelsPermission::all());
    }
}
