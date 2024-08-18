@extends('layouts.pustakawan_layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-center mb-4">
                <img src="{{ asset('storage/img/cover/' . ($data->cover_buku ?? 'unknown_cover.png')) }}"
                    class="w-25 rounded" alt="" srcset="">
            </div>
            <div class="d-flex justify-content-center gap-3">
                @if ($format == 'elektronik')
                    <a href="{{ route('read_e_book', $data->id) }}" class="mr-2">
                        <button class="btn btn-warning"><i class="fas fa-book"></i> Baca E-book</button>
                    </a>
                    <a href="{{ asset('storage/pdf/' . $data->e_book_file) }}" class="mr-2" download>
                        <button class="btn btn-success"><i class="fas fa-download"></i> Download E-book</button>
                    </a>
                @endif
                <a href="{{ route('edit_book', ['format' => $format, 'id' => $data->id]) }}">
                    <button class="btn btn-primary"><i class="fas fa-pen"></i> Perbarui data</button>
                </a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5>Informasi Buku</h5>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="mb-0">Judul buku</label>
                        <input type="text" class="form-control" value="{{ $data->judul }}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="mb-0">Author</label>
                        <input type="text" class="form-control" value="{{ $data->author }}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="mb-0">Penerbit</label>
                        <input type="text" class="form-control" value="{{ $data->penerbit }}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="mb-0">ISBN</label>
                        <input type="text" class="form-control" value="{{ $data->isbn }}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="mb-0">Tanggal terbit</label>
                        <input type="text" class="form-control" value="{{ $data->tgl_terbit }}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="mb-0">Jumlah halaman</label>
                        <input type="text" class="form-control" value="{{ $data->jml_halaman }}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="mb-0">Bahasa</label>
                        <input type="text" class="form-control" value="{{ $data->bahasa }}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="mb-0">Format</label>
                        <input type="text" class="form-control" value="{{ $data->format }}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="mb-0">Kategori</label>
                        <input type="text" class="form-control" value="{{ $data->category->nama_kategori }}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="mb-0">Status</label>
                        <input type="text" class="form-control" value="{{ $data->status }}" disabled>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="mb-0">Sinopsis/Deskripsi</label>
                        <textarea class="form-control" rows="6" disabled>{{ $data->sinopsis }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="mb-0">Ditambahkan pada</label>
                        <input type="text" class="form-control" value="{{ $data->created_at }}" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="mb-0">Diperbarui pada</label>
                        <input type="text" class="form-control" value="{{ $data->updated_at }}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5>Informasi Denda</h5>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="mb-0">Denda terlambat</label>
                        <input type="text" class="form-control" value="{{ $data->fine->denda_terlambat ?? '' }}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="mb-0">Denda rusak</label>
                        <input type="text" class="form-control" value="{{ $data->fine->denda_rusak ?? '' }}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="mb-0">Denda buku tidak kembali</label>
                        <input type="text" class="form-control" value="{{ $data->fine->denda_tidak_kembali ?? ''  }}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
