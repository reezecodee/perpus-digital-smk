<?php

namespace App\Http\Controllers\Pustakawan\MasterDataPengguna;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show_data_user($role)
    {
        $validRoles = ['Admin', 'Pustakawan', 'Peminjam'];
        $uc_first = ucfirst($role);

        if (in_array($uc_first, $validRoles)) {
            $users = User::role($role)
                ->where('id', '!=', auth()->id())->latest()
                ->get();
        } else {
            abort(404);
        }

        return view('pustakawan_views.master_data.pengguna.index', [
            'title' => "Daftar Data $uc_first",
            'heading' => "Daftar $uc_first",
            'users' => $users,
            'role' => strtolower(basename(url()->current()))
        ]);
    }

    public function show_add_user($role_param)
    {
        if (!in_array($role_param, ['admin', 'pustakawan', 'peminjam'])) {
            abort(404);
        }

        $user = null;
        $role = ucfirst($role_param);

        return view('pustakawan_views.master_data.pengguna.form', [
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
        
        return view('pustakawan_views.master_data.pengguna.form', [
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

        return view('pustakawan_views.master_data.pengguna.detail', [
            'title' => "Detail Data $role",
            'heading' => "Detail Data $role",
            'data' => $user,
            'role' => $role
        ]);
    }
}
