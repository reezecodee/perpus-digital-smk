@extends('layouts.pustakawan_layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Username</label>
                                <input type="text" name="nama" placeholder="Masukkan username" class="form-control"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Nama lengkap</label>
                                <input type="text" name="nama" placeholder="Masukkan nama" class="form-control"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Nomor Induk Siswa (NIS)</label>
                                <input type="number" name="nis" placeholder="Masukkan NIS" class="form-control"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Nomor Induk Siswa Nasional</label>
                                <input type="number" name="nisn" placeholder="Masukkan NISN" class="form-control"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Nomor telepon</label>
                                <input type="number" name="telepon" placeholder="Masukkan no.telepon" class="form-control"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input type="email" name="email" placeholder="Masukkan email" class="form-control"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Password sementara</label>
                                <input type="text" name="password" placeholder="Masukkan password sementara"
                                    class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Konfirmasi password</label>
                                <input type="text" name="confirm_password" placeholder="Masukkan konfirmasi password"
                                    class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="">Alamat</label>
                                <textarea name="alamat" cols="30" rows="5" placeholder="Masukkan alamat" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Status akun</label>
                                <select name="status_akun" class="form-control" required>
                                    <option selected>Pilih status akun</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Non aktif">Non aktif</option>
                                </select>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="form-check">
                                    <input type="checkbox" name="konfirmasi" value="setuju" class="form-check-input"
                                        id="konfirmasiCheck">
                                    <label class="form-check-label" for="konfirmasiCheck">Saya yakin data tersebut sudah
                                        benar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-center">
                            <img src="https://lh3.googleusercontent.com/ogw/AF2bZygNbPseDkQ0HS9b3esmBQqCXS-H_eenMu566cNexqZF128=s64-c-mo"
                                alt="" class=" rounded-circle w-25">
                        </div>
                        <div class="my-3">
                            <input class="form-control" type="file" accept=".jpg, .png, .jpeg" name="foto_profile">
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Tambah pustakawan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
