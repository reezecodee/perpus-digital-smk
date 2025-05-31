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
        $roleLowerCase = lcfirst($role);

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

        return view('test_views.user-management.index', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'role', 'roleLowerCase'));
    }

    public function show_edit_user($role_param, $id)
    {
        $user = User::findOrFail($id);
        $role = $user->getRoleNames()->implode(', ');

        if ($role_param != strtolower($role)) {
            abort(404);
        }

        $title = "Edit {$role}";
        $name = 'Edit';
        $pageTitle = "Edit {$role}";
        $type = 'btn-back';
        $btnName = "Kembali";
        $url = route('data-user', strtolower($role));

        return view('test_views.user-management.edit', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'role', 'url', 'user'));
    }

    public function show_detail_user($role_param, $id)
    {
        $user = User::findOrFail($id);
        $role = $user->getRoleNames()->implode(', ');
        if ($role_param != strtolower($role)) {
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
