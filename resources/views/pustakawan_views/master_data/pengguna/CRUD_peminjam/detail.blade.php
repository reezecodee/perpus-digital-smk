@extends('layouts.pustakawan_layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Username</label>
                            <input type="text" name="nama" class="form-control" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="">Nama lengkap</label>
                            <input type="text" name="nama" class="form-control" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="">Nomor Induk Siswa (NIS)</label>
                            <input type="number" name="nis" class="form-control" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="">Nomor Induk Siswa Nasional</label>
                            <input type="number" name="nisn" class="form-control" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="">Nomor telepon</label>
                            <input type="number" name="telepon" class="form-control" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" disabled>
                        </div>
                        <div class="col-md-12">
                            <label for="">Alamat</label>
                            <textarea name="alamat" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Status akun</label>
                            <select name="status_akun" class="form-control" disabled>
                                <option selected>Pilih status akun</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Non aktif">Non aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-center">
                        <img src="https://lh3.googleusercontent.com/ogw/AF2bZygNbPseDkQ0HS9b3esmBQqCXS-H_eenMu566cNexqZF128=s64-c-mo"
                            alt="" class=" rounded-circle w-25">
                    </div>
                    <div class="my-3 text-center">
                        <h3>Atyla Azfa Al Harits</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
