@extends('layouts.pustakawan_layout')
@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4>Informasi metadata aplikasi</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama sekolah</label>
                                    <input type="text" name="nama_perpus" class="form-control"
                                        placeholder="Nama sekolah" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Keyword</label>
                                    <input type="text" name="keyword" class="form-control"
                                        placeholder="Keyword website" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Hak cipta</label>
                                    <input type="text" name="keyword" class="form-control"
                                        placeholder="Keyword website" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Website utama sekolah</label>
                                    <input type="text" name="website" class="form-control"
                                        placeholder="Website utama sekolah" value="" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Deskripsi singkat</label>
                                    <textarea name="alamat" class="form-control" cols="30" rows="3" placeholder="Deskripsi singkat" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input type="checkbox" name="konfirmasi" value="setuju" class="form-check-input"
                                        id="konfirmasiCheck" required>
                                    <label class="form-check-label" for="konfirmasiCheck">Saya yakin data tersebut sudah
                                        benar</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan data</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4>Favicon website</h4>
                        <hr>
                        <div class="d-flex justify-content-center">
                            <img src="https://lh3.googleusercontent.com/ogw/AF2bZygNbPseDkQ0HS9b3esmBQqCXS-H_eenMu566cNexqZF128=s64-c-mo"
                                alt="" class=" rounded-circle w-25">
                        </div>
                        <div class="my-3">
                            <input class="form-control" type="file" accept=".jpg, .png, .jpeg" name="logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
