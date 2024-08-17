@extends('layouts.pustakawan_layout')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="" class="mb-0">Judul buku</label>
                                <input type="text" name="judul" placeholder="Masukkan judul buku" id=""
                                    class="form-control @error('judul') is-invalid @enderror" autocomplete="off"
                                    value="{{ old('judul', $data->judul ?? '') }}" required>
                                @error('judul')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="mb-0">Author</label>
                                <input type="text" name="author" placeholder="Masukkan author buku" id=""
                                    class="form-control @error('author') is-invalid @enderror" autocomplete="off"
                                    value="{{ old('author', $data->author ?? '') }}" required>
                                @error('author')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="mb-0">Penerbit</label>
                                <input type="text" name="penerbit" placeholder="Masukkan penerbit buku" id=""
                                    class="form-control @error('penerbit') is-invalid @enderror" autocomplete="off"
                                    value="{{ old('penerbit', $data->penerbit ?? '') }}" required>
                                @error('penerbit')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="mb-0">ISBN</label>
                                <input type="text" name="isbn" placeholder="Masukkan nomor ISBN buku" id=""
                                    class="form-control @error('isbn') is-invalid @enderror" autocomplete="off"
                                    value="{{ old('isbn', $data->isbn ?? '') }}" required>
                                @error('isbn')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="mb-0">Jumlah halaman</label>
                                <input type="number" name="jml_halaman" placeholder="Masukan jumlah halaman buku"
                                    id="" class="form-control @error('jml_halaman') is-invalid @enderror"
                                    autocomplete="off" value="{{ old('jml_halaman', $data->jml_halaman ?? '') }}" required>
                                @error('jml_halaman')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="mb-0">Kategori</label>
                                <select name="kategori_id" id=""
                                    class="form-control @error('kategori_id') is-invalid @enderror" required>
                                    <option value="{{ old('kategori_id', $data->kategori_id ?? '') }}" selected>
                                        {{ old('kategori_id', $data->kategori_id ?? '-- Pilih kategori --') }}</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="mb-0">Tanggal terbit</label>
                                <input type="date" name="tgl_terbit" id=""
                                    class="form-control @error('tgl_terbit') is-invalid @enderror" autocomplete="off"
                                    value="{{ old('tgl_terbit', $data->tgl_terbit ?? '') }}" required>
                                @error('tgl_terbit')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="mb-0">Bahasa</label>
                                <input type="text" name="bahasa" placeholder="Masukkan bahasa buku" id=""
                                    class="form-control @error('bahasa') is-invalid @enderror" autocomplete="off"
                                    value="{{ old('bahasa', $data->bahasa ?? '') }}" required>
                                @error('bahasa')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="mb-0">Status</label>
                                <select name="status" id=""
                                    class="form-control @error('status') is-invalid @enderror" required>
                                    <option value="{{ old('status', $data->status ?? '') }}" selected>
                                        {{ old('status', $data->status ?? '-- Pilih status buku --') }}</option>
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Tidak tersedia">Tidak tersedia</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="" class="mb-0">Sinopsis/Deskripsi</label>
                                <textarea name="sinopsis" id="" rows="7" required
                                    class="form-control @error('sinopsis') is-invalid @enderror" placeholder="Masukkan sinopsis atau deskripsi buku">{{ old('sinopsis', $data->sinopsis ?? '') }}</textarea>
                                @error('sinopsis')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="format" id="" value="Fisik">
                        <div class="col-md-12 mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="konfirmasiCheck"
                                    style="cursor: pointer" required>
                                <label class="form-check-label" for="konfirmasiCheck" style="cursor: pointer">Saya
                                    yakin
                                    data tersebut sudah
                                    benar</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan buku</button>
                    <a href="">
                        <button type="button" class="btn btn-warning">Refresh</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Cover buku</label>
                            <div class="d-flex justify-content-center mb-3">
                                <img src="/img/unknown_cover.png" alt="" class="w-75 border preview" srcset="">
                            </div>
                            <div class="d-flex justify-content-center w-full">
                                <input type="file" name="image" class="image d-none" id="fileInput">
                                <button class="btn btn-success" id="uploadBtn" type="button" data-toggle="modal"
                                    data-target="#modal-defaults"><i class="fas fa-upload"></i> Upload cover</button>
                            </div>
                        </div>
                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Default Modal</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="img-container">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <img id="image"
                                                        src="/img/unknown_cover.png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Upload PDF E-book</label>
                            <div class="d-flex justify-content-center mb-3">
                                <img src="https://www.svgrepo.com/show/518507/pdf-doc-scan.svg" alt=""
                                    class="w-25 border" srcset="">
                            </div>
                            <div class="d-flex justify-content-center w-full">
                                <button class="btn btn-success"><i class="fas fa-upload"></i> Upload PDF</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="cropper_square.js"></script>
@endsection
