@extends('layouts.pustakawan_layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            @include('pustakawan_views.components.input.input-disable', [
                                'label' => 'Username',
                                'name' => 'username',
                                'value' => $data->username,
                            ])
                        </div>
                        <div class="col-md-6">
                            @include('pustakawan_views.components.input.input-disable', [
                                'label' => 'Nama lengkap',
                                'name' => 'nama',
                                'value' => $data->nama,
                            ])
                        </div>
                        <div class="col-md-6">
                            @include('pustakawan_views.components.input.input-disable', [
                                'label' =>
                                    'Nomor Induk ' . in_array($role, ['admin', 'pustakawan'])
                                        ? 'Pegawai (NIP)'
                                        : 'Siswa (NIS)',
                                'name' => 'nip_nis',
                                'value' => $data->nip_nis,
                            ])
                        </div>
                        <div class="col-md-6">
                            @include('pustakawan_views.components.input.input-disable', [
                                'label' => 'Nomor telepon',
                                'name' => 'telepon',
                                'value' => $data->telepon,
                            ])
                        </div>
                        <div class="col-md-6">
                            @include('pustakawan_views.components.input.input-disable', [
                                'label' => 'Email',
                                'name' => 'email',
                                'value' => $data->email,
                            ])
                        </div>
                        @if ($role == 'peminjam')
                            <div class="col-md-6">
                                @include('pustakawan_views.components.input.input-disable', [
                                    'label' => 'Nomor Induk Siswa Nasional',
                                    'name' => 'nisn',
                                    'value' => $data->nisn,
                                ])
                            </div>
                        @endif
                        <div class="col-md-6">
                            @include('pustakawan_views.components.input.input-disable', [
                                'label' => 'Jenis kelamin',
                                'name' => 'jk',
                                'value' => $data->jk,
                            ])
                        </div>
                        <div class="col-md-12">
                            @include('pustakawan_views.components.input.textarea-disable', [
                                'label' => 'Alamat',
                                'name' => 'alamat',
                                'value' => $data->alamat,
                            ])
                        </div>
                        <div class="col-md-12">
                            @include('pustakawan_views.components.input.input-disable', [
                                'label' => 'Status akun',
                                'name' => 'status',
                                'value' => $data->status,
                            ])
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('storage/img/profile/' . ($data->photo ?? 'unknown.jpg')) }}" alt=""
                            width="200" class="rounded-circle">
                    </div>
                    <div class="my-3 text-center">
                        <h3>{{ $data->nama }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
