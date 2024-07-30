@extends('layouts.pustakawan_layout')
@section('content')
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin"
                                    class="rounded-circle p-1 bg-primary" width="110">
                                <div class="mt-3">
                                    <h4>John Doe</h4>
                                    <p class="text-secondary mb-3">Full Stack Developer</p>
                                    <button class="btn btn-danger">Logout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Overview Profile</h4>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nama lengkap</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="nama"
                                        placeholder="Masukkan nama lengkap" value="" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">NIP</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="nip"
                                        placeholder="Masukkan Nomor Induk Pegawai" value="" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">No. telepon</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="number" class="form-control" name="telepon"
                                        placeholder="Masukkan no. telepon" value="" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="email" class="form-control" name="email" placeholder="Masukkan email"
                                        value="" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Alamat</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <textarea name="alamat" class="form-control" cols="30" rows="3" placeholder="Masukkan alamat"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <button class="btn btn-primary" type="submit">Ubah password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Ganti Password</h4>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Password saat ini</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" name="password"
                                placeholder="Masukkan password saat ini" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Password baru</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="password" class="form-control" name="new_password"
                                placeholder="Masukkan Password Baru" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Konfirmasi password</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="password" class="form-control" name="confirm_password"
                                placeholder="Masukkan ulang password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9 text-secondary">
                            <button class="btn btn-primary" type="submit">Ubah profile</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
