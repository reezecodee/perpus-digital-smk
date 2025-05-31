<?php

namespace App\Http\Controllers\Librarian\MasterDataUsers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show_data_user($role)
    {
        $validRoles = ['Admin', 'Pustakawan', 'Siswa'];
        $role = ucfirst($role);

        if (in_array($role, $validRoles)) {
            $users = User::role($role)
                ->where('id', '!=', auth()->id())->latest()
                ->get();
        } else {
            abort(404);
        }

        // return view('librarian-pages.master-data.users-management.index', [
        //     'title' => "Daftar Data $role",
        //     'heading' => "Daftar $role",
        //     'users' => $users,
        //     'role' => strtolower(basename(url()->current()))
        // ]);

        $title = "Manajemen {$role}";
        $name = 'Overview';
        $pageTitle = "Manajemen {$role}";
        $type = 'btn-modal';
        $btnName = "Tambah {$role}";

        return view('test_views.user-management.index', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'role'));
    }

    public function show_add_user($role_param)
    {
        if (!in_array($role_param, ['admin', 'pustakawan', 'peminjam'])) {
            abort(404);
        }

        $user = null;
        $role = ucfirst($role_param);

        return view('librarian-pages.master-data.users-management.form', [
            'title' => "Tambah $role baru",
            'heading' => "Tambah $role",
            'data' => $user,
            'role' => strtolower($role)
        ]);
    }

    public function show_edit_user($role_param, $id)
    {
        $user = User::findOrFail($id);
        $role = $user->getRoleNames()->implode(', ');
        
        if ($role_param != strtolower($role)) {
            abort(404);
        }
        
        return view('librarian-pages.master-data.users-management.form', [
            'title' => "Perbarui Data $role",
            'heading' => "Perbarui $role",
            'data' => $user,
            'role' => strtolower($role)
        ]);
    }

    public function show_detail_user($role_param, $id)
    {
        $user = User::findOrFail($id);
        $role = $user->getRoleNames()->implode(', ');
        if($role_param != strtolower($role)){
            abort(404);
        }

        return view('librarian-pages.master-data.users-management.detail', [
            'title' => "Detail Data $role",
            'heading' => "Detail Data $role",
            'data' => $user,
            'role' => $role
        ]);
    }
}
