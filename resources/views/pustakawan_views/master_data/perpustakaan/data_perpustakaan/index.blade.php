@extends('layouts.pustakawan_layout')
@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4>Informasi perpustakaan</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama perpustakaan</label>
                                    <input type="text" name="nama_perpus" class="form-control"
                                        placeholder="Nama perpustakaan" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nomor bangunan</label>
                                    <input type="text" name="no_bangunan" class="form-control"
                                        placeholder="Nama perpustakaan" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">No. telepon</label>
                                    <input type="number" name="telepon" class="form-control"
                                        placeholder="Telepon perpustakaan" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Email perpustakaan" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jam oprasional buka</label>
                                    <input type="time" name="operasional_buka" class="form-control"
                                        placeholder="Jam operasional buka" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jam oprasional tutup</label>
                                    <input type="time" name="operasional_tutup" class="form-control"
                                        placeholder="Jam operasional tutup" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Website</label>
                                    <input type="text" name="website" class="form-control"
                                        placeholder="Website perpustakaan" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Instagram</label>
                                    <input type="text" name="instagram" class="form-control"
                                        placeholder="Link instagram" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Facebook</label>
                                    <input type="text" name="facebook" class="form-control"
                                        placeholder="Link facebook" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Twitter/X</label>
                                    <input type="text" name="twitter_x" class="form-control"
                                        placeholder="Link twitter x" value="" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" class="form-control" cols="30" rows="3" placeholder="Alamat perpustakaan" required></textarea>
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
                        <h4>Logo perpustakaan</h4>
                        <hr>
                        <div class="d-flex justify-content-center">
                            <img src="https://lh3.googleusercontent.com/ogw/AF2bZygNbPseDkQ0HS9b3esmBQqCXS-H_eenMu566cNexqZF128=s64-c-mo"
                                alt="" class="w-25">
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
