@extends('layouts.pustakawan_layout')
@section('content')
    @if (isset($data))
        <form action="{{ route('update_book', ['format' => $format, 'id' => $data->id]) }}" method="post"
            enctype="multipart/form-data">
            @method('PUT')
        @else
            <form action="{{ route('store_book', $format) }}" method="post" enctype="multipart/form-data">
    @endif
    @csrf
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
                                <select name="kategori_id" id="kategori_id"
                                    class="form-control @error('kategori_id') is-invalid @enderror" required>
                                    <option value="">-- Pilih kategori --</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('kategori_id', $data->kategori_id ?? '') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama_kategori }}
                                        </option>
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
                        <input type="hidden" name="format" id="" value="{{ ucfirst($format) }}">
                    </div>
                    @if ($format == 'elektronik')
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
                        <button type="submit" class="btn btn-primary">Simpan buku</button>
                        <a href="">
                            <button type="button" class="btn btn-warning">Refresh</button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Cover buku</label>
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('storage/img/cover/' . ($data->cover_buku ?? 'unknown_cover.png')) }}"
                                    alt="" class="w-75 border preview" id="coverPreview">
                            </div>
                            <p class="text-center" id="file-name-cover"></p>
                            <div class="d-flex justify-content-center w-full">
                                <input type="file" id="fileInputCover" name="cover_buku" class="image"
                                    style="display: none" accept=".jpg, .png, .jpeg">
                                <button class="btn btn-success mr-2" type="button" id="uploadCoverBtn"><i
                                        class="fas fa-upload"></i> Upload cover</button>
                                <a href="/crop-cover" target="_blank">
                                    <button class="btn btn-warning" type="button"><i class="fas fa-crop-alt"></i> Crop
                                        gambar</button>
                                </a>
                            </div>
                            @error('cover_buku')
                                <div style="color: red;">{{ $message }}</div>
                            @enderror
                            <div id="error-message" style="display: none; color: red;"></div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($format == 'elektronik')
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Upload PDF E-book</label>
                                <div class="d-flex justify-content-center mb-3">
                                    <img src="https://www.svgrepo.com/show/518507/pdf-doc-scan.svg" alt=""
                                        class="w-25 border" srcset="">
                                </div>
                                <p id="fileNamePDF" class="text-center"></p>
                                <input type="file" name="e_book_file" id="fileInputPDF" accept=".pdf"
                                    style="display: none">
                                <div class="d-flex justify-content-center w-full">
                                    <button type="button" id="uploadPDFBtn" class="btn btn-success mr-2"><i
                                            class="fas fa-upload"></i>
                                        Upload PDF</button>
                                    @if (isset($data->e_book_file))
                                        <a href="{{ route('read_e_book', $data->id) }}">
                                            <button type="button" class="btn btn-warning"><i class="fas fa-book"></i>
                                                Lihat E-book</button>
                                        </a>
                                    @endif
                                </div>
                                @error('e_book_file')
                                    <div style="color: red;">{{ $message }}</div>
                                @enderror
                                <p id="errorMessagePDF"></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    @if ($format == 'fisik')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="mb-0">Denda buku terlambat</label>
                            <input type="number" name="denda_terlambat" placeholder="Nominal denda jika buku terlambat"
                                id="" class="form-control @error('denda_terlambat') is-invalid @enderror"
                                autocomplete="off"
                                value="{{ old('denda_terlambat', $data->fine->denda_terlambat ?? '') }}" required>
                            @error('denda_terlambat')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="mb-0">Denda buku rusak</label>
                            <input type="number" name="denda_rusak" placeholder="Nominal denda jika buku terlambat"
                                id="" class="form-control @error('denda_rusak') is-invalid @enderror"
                                autocomplete="off" value="{{ old('denda_rusak', $data->fine->denda_rusak ?? '') }}"
                                required>
                            @error('denda_rusak')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="mb-0">Denda buku tidak kembali</label>
                            <input type="text" name="denda_tidak_kembali"
                                placeholder="Nominal denda jika buku tidak_kembali" id=""
                                class="form-control @error('denda_tidak_kembali') is-invalid @enderror"
                                autocomplete="off"
                                value="{{ old('denda_tidak_kembali', $data->fine->denda_tidak_kembali ?? '') }}" required>
                            @error('denda_tidak_kembali')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="konfirmasiCheck" style="cursor: pointer"
                            required>
                        <label class="form-check-label" for="konfirmasiCheck" style="cursor: pointer">Saya
                            yakin
                            data tersebut sudah
                            benar</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan buku</button>
                <a href="">
                    <button type="button" class="btn btn-warning">Refresh</button>
                </a>
            </div>
        </div>
    @endif
    </form>
    <script src="/js/upload_book.js"></script>
@endsection
