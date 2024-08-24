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
            'manage_carousel',
            'manage_popup',
            'manage_bantuan',
            'export_data',
            'add_admin',
            'edit_admin',
            'delete_admin',
            'add_pustakawan',
            'edit_pustakawan',
            'delete_pustakawan',
            'add_peminjam',
            'edit_peminjam',
            'delete_peminjam',
            'add_buku_fisik',
            'edit_buku_fisik',
            'delete_buku_fisik',
            'add_ebook',
            'edit_ebook',
            'delete_ebook',
            'add_denda',
            'edit_denda',
            'delete_denda',
            'add_rak',
            'edit_rak',
            'delete_rak',
            'add_peminjaman',
            'edit_peminjaman',
            'delete_peminjaman',
            'add_kunjungan',
            'edit_kunjungan',
            'delete_kunjungan',
            'manage_aplikasi',
            'manage_perpustakaan',
            'send_notification',
            'send_email',
            'create_article',
            'add_schedule',
            'delete_schedule'
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
