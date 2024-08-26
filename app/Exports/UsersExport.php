<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $filter;
    protected $role;

    public function __construct($filter = null, $role)
    {
        $this->filter = $filter;
        $this->role = $role;
    }

    public function collection()
    {
        // Tambahkan NIS atau NIP terlebih dahulu
        $get_attributes = [
            'username',
            'nip_nis',
        ];

        // Jika role adalah Peminjam, tambahkan NISN setelah NIS
        if ($this->role === 'Peminjam') {
            $get_attributes[] = 'nisn';
        }

        // Tambahkan atribut lainnya setelahnya
        $get_attributes = array_merge($get_attributes, [
            'nama',
            'email',
            'telepon',
            'jk',
            'status',
            'alamat'
        ]);

        $user = User::role($this->role);

        if ($this->filter) {
            $user = $user->where('status', $this->filter);
        }

        $user = $user->select($get_attributes)->get();

        return $user;
    }

    public function headings(): array
    {
        // Tambahkan NIS atau NIP terlebih dahulu
        $headings = [
            'Username',
            $this->role === 'Peminjam' ? 'NIS' : 'NIP',
        ];

        // Jika role adalah Peminjam, tambahkan NISN setelah NIS
        if ($this->role === 'Peminjam') {
            $headings[] = 'NISN';
        }

        // Tambahkan heading lainnya setelahnya
        $headings = array_merge($headings, [
            'Nama',
            'Email',
            'Telepon',
            'Jenis kelamin',
            'Status',
            'Alamat',
        ]);

        return $headings;
    }
}
