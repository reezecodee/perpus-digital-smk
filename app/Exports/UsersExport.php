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

    // Constructor untuk menerima filter dari controller
    public function __construct($filter = null, $role)
    {
        $this->filter = $filter;
        $this->role = $role;
    }

    public function collection()
    {
        $get_attributes = [
            'username',
            'nip_nis',
            'nama',
            'email',
            'telepon',
            'jk',
            'status',
            'alamat'
        ];

        $admin = User::role($this->role); 

        if ($this->filter) {
            $admin = $admin->where('status', $this->filter)->get();
        }

        $admin = $admin->get($get_attributes);

        return $admin;
    }

    public function headings(): array
    {
        return [
            'Username',
            'NIP',
            'Nama',
            'Email',
            'Telepon',
            'Jenis kelamin',
            'Status',
            'Alamat'
        ];
    }
}
