@extends('layouts.pustakawan_layout')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            @if (Request::is('master-data/user/**/edit*'))
                <form action="{{ route('update_user', $data->id) }}" method="post">
                    @csrf
                    @method('PUT')
            @endif
            @if (Request::is('master-data/user/**/tambah*'))
                <form action="{{ route('store_user', $role) }}" method="post">
                    @csrf
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            @include('pustakawan_views.components.input.basic', [
                                'label' => 'Username',
                                'name' => 'username',
                                'value' => old('username', $data->username ?? ''),
                                'placeholder' => 'Masukkan username',
                                'type' => 'text',
                                'is_required' => true,
                            ])
                        </div>
                        <div class="col-md-6">
                            @include('pustakawan_views.components.input.basic', [
                                'label' => 'Nama lengkap',
                                'name' => 'nama',
                                'value' => old('nama', $data->nama ?? ''),
                                'placeholder' => 'Masukkan nama lengkap',
                                'type' => 'text',
                                'is_required' => true,
                            ])
                        </div>
                        <div class="col-md-6">
                            @include('pustakawan_views.components.input.basic', [
                                'label' =>
                                    'Nomor Induk' . in_array($role, ['Admin', 'Pustakawan'])
                                        ? 'Pegawai (NIP)'
                                        : 'Siswa (NIS)',
                                'name' => 'nip_nis',
                                'value' => old('nip_nis', $data->nip_nis ?? ''),
                                'placeholder' =>
                                    'Masukkan ' . in_array($role, ['Admin', 'Pustakawan']) ? 'NIP' : 'NIS',
                                'type' => 'number',
                                'is_required' => true,
                            ])
                        </div>
                        <div class="col-md-6">
                            @include('pustakawan_views.components.input.basic', [
                                'label' => 'Nomor telepon',
                                'name' => 'telepon',
                                'value' => old('telepon', $data->telepon ?? ''),
                                'placeholder' => 'Masukkan telepon',
                                'type' => 'number',
                                'is_required' => true,
                            ])
                        </div>
                        <div class="col-md-6">
                            @include('pustakawan_views.components.input.basic', [
                                'label' => 'Email',
                                'name' => 'email',
                                'value' => old('email', $data->email ?? ''),
                                'placeholder' => 'Masukkan email',
                                'type' => 'email',
                                'is_required' => true,
                            ])
                        </div>
                        @if ($role == 'peminjam')
                            <div class="col-md-6">
                                @include('pustakawan_views.components.input.basic', [
                                    'label' => 'NISN',
                                    'name' => 'nisn',
                                    'value' => old('nisn', $data->nisn ?? ''),
                                    'placeholder' => 'Masukkan NISN',
                                    'type' => 'number',
                                    'is_required' => true,
                                ])
                            </div>
                        @endif
                        <div class="col-md-6">
                            @include('pustakawan_views.components.input.select', [
                                'label' => 'Jenis kelamin',
                                'name' => 'jk',
                                'options' => ['Laki-laki', 'Perempuan'],
                                'selected_value' => $data->jk ?? '',
                                'is_required' => true,
                                'placeholder' => 'Pilih jenis kelamin',
                            ])
                        </div>
                        @if (!isset($data->status) || $data->status == 'Non-aktif')
                            <div class="col-md-6">
                                @include('pustakawan_views.components.input.basic', [
                                    'label' => 'Password sementara',
                                    'name' => 'password',
                                    'value' => old('password'),
                                    'placeholder' => 'Masukkan password sementara',
                                    'type' => 'text',
                                    'is_required' => false,
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('pustakawan_views.components.input.basic', [
                                    'label' => 'Konfirmasi password',
                                    'name' => 'confirm_password',
                                    'value' => old('confirm_password'),
                                    'placeholder' => 'Masukkan konfirmasi password',
                                    'type' => 'text',
                                    'is_required' => false,
                                ])
                            </div>
                        @endif
                        <div class="col-md-12">
                            @include('pustakawan_views.components.input.textarea', [
                                'label' => 'Alamat',
                                'name' => 'alamat',
                                'value' => old('alamat', $data->alamat ?? ''),
                                'placeholder' => 'Masukkan alamat',
                                'is_required' => true,
                            ])
                        </div>
                        <div class="col-md-12">
                            @include('pustakawan_views.components.input.select', [
                                'label' => 'Status akun',
                                'name' => 'status',
                                'options' => ['Aktif', 'Non-aktif'],
                                'selected_value' => $data->status ?? '',
                                'is_required' => true,
                                'placeholder' => 'Pilih status akun',
                            ])
                        </div>
                        @if ($role == 'admin')
                            <div class="col-md-12 mt-2">
                                <p class="text-danger">* Anda tidak dapat lagi mengubah akun ini jika statusnya
                                    sudah
                                    aktif.</p>
                            </div>
                        @endif
                        <div class="col-md-12 mt-2">
                            @include('pustakawan_views.components.input.cnfrm-checkbox')
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    @include('pustakawan_views.components.input.upload-profile', [
                        'photo' => $data->photo ?? 'unknown.jpg',
                    ])
                </div>
            </div>
            @include('pustakawan_views.components.modal.crop-profile-modal')
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Simpan data {{ $role }}</button>
            </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById("browse_image").addEventListener('change', function() {
            var file = this.files[0];
            var size = file.size;
            if (size > 1048576) {
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Gambar yang di upload terlalu besar, maximal adalah 1MB',
                    icon: 'error',
                    confirmButtonText: 'Oke'
                });
                this.value = "";
            }
        });
    </script>
@endsection
