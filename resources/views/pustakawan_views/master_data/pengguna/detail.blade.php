@extends('layouts.pustakawan_layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Username</label>
                            <input type="text" value="{{ $data->username }}" class="form-control" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="">Nama lengkap</label>
                            <input type="text" value="{{ $data->nama }}" class="form-control" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="">Nomor Induk Pegawai (NIP)</label>
                            <input type="text" value="{{ $data->nip_nis }}" class="form-control" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="">Nomor telepon</label>
                            <input type="text" value="{{ $data->telepon }}" class="form-control" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="">Email</label>
                            <input type="text" value="{{ $data->email }}" class="form-control" disabled>
                        </div>
                        @if ($role == 'peminjam')
                            <div class="col-md-6">
                                <label for="">Nomor Induk Siswa Nasional</label>
                                <input type="text" value="{{ $data->nisn }}" class="form-control" disabled>
                            </div>
                        @endif
                        <div class="col-md-6">
                            <label for="">Jenis kelamin</label>
                            <input type="text" value="{{ $data->jk }}" class="form-control" disabled>
                        </div>
                        <div class="col-md-12">
                            <label for="">Alamat</label>
                            <textarea name="alamat" rows="5" class="form-control" disabled>{{ $data->alamat }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Status akun</label>
                            <input type="text" value="{{ $data->status }}" class="form-control" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('storage/img/profile/' . ($data->photo ?? 'unknown.jpg')) }}" alt="" width="200"
                            class="rounded-circle">
                    </div>
                    <div class="my-3 text-center">
                        <h3>{{ $data->nama }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
