@extends('layouts.pustakawan_layout')
@section('content')
    @include('pustakawan_views.components.card.card-cover-lg')
    <div class="card">
        <div class="card-body">
            <h5>Informasi Buku</h5>
            <div class="row">
                <div class="col-md-4">
                    @include('pustakawan_views.components.input.input-disable', [
                        'label' => 'Judul buku',
                        'name' => 'judul',
                        'value' => $data->judul,
                    ])
                </div>
                <div class="col-md-4">
                    @include('pustakawan_views.components.input.input-disable', [
                        'label' => 'Author',
                        'name' => 'author',
                        'value' => $data->author,
                    ])
                </div>
                <div class="col-md-4">
                    @include('pustakawan_views.components.input.input-disable', [
                        'label' => 'Penerbit',
                        'name' => 'penerbit',
                        'value' => $data->penerbit,
                    ])
                </div>
                <div class="col-md-4">
                    @include('pustakawan_views.components.input.input-disable', [
                        'label' => 'ISBN',
                        'name' => 'isbn',
                        'value' => $data->isbn,
                    ])
                </div>
                <div class="col-md-4">
                    @include('pustakawan_views.components.input.input-disable', [
                        'label' => 'Tanggal terbit',
                        'name' => 'tgl_terbit',
                        'value' => $data->tgl_terbit,
                    ])
                </div>
                <div class="col-md-4">
                    @include('pustakawan_views.components.input.input-disable', [
                        'label' => 'Jumlah halaman',
                        'name' => 'jml_halaman',
                        'value' => $data->jml_halaman,
                    ])
                </div>
                <div class="col-md-4">
                    @include('pustakawan_views.components.input.input-disable', [
                        'label' => 'Bahasa',
                        'name' => 'bahasa',
                        'value' => $data->bahasa,
                    ])
                </div>
                <div class="col-md-4">
                    @include('pustakawan_views.components.input.input-disable', [
                        'label' => 'Format',
                        'name' => 'format',
                        'value' => $data->format,
                    ])
                </div>
                <div class="col-md-4">
                    @include('pustakawan_views.components.input.input-disable', [
                        'label' => 'Kategori',
                        'name' => 'kategori',
                        'value' => $data->category->nama_kategori,
                    ])
                </div>
                <div class="col-md-4">
                    @include('pustakawan_views.components.input.input-disable', [
                        'label' => 'Status',
                        'name' => 'status',
                        'value' => $data->status,
                    ])
                </div>
                <div class="col-md-12">
                    @include('pustakawan_views.components.input.textarea-disable', [
                        'label' => 'Sinopsis/Deskripsi',
                        'name' => 'sinopsis',
                        'value' => $data->sinopsis,
                    ])
                </div>
                <div class="col-md-6">
                    @include('pustakawan_views.components.input.input-disable', [
                        'label' => 'Ditambahkan pada',
                        'name' => 'created_at',
                        'value' => $data->created_at,
                    ])
                </div>
                <div class="col-md-6">
                    @include('pustakawan_views.components.input.input-disable', [
                        'label' => 'Diperbarui pada',
                        'name' => 'updated_at',
                        'value' => $data->updated_at,
                    ])
                </div>
            </div>
        </div>
    </div>
    @if ($data->format == 'Fisik')
        <div class="card">
            <div class="card-body">
                <h5>Informasi Denda</h5>
                <div class="row">
                    <div class="col-md-4">
                        @include('pustakawan_views.components.input.input-disable', [
                            'label' => 'Denda buku terlambat',
                            'name' => 'denda_terlambat',
                            'value' => $data->fine->denda_terlambat,
                        ])
                    </div>
                    <div class="col-md-4">
                        @include('pustakawan_views.components.input.input-disable', [
                            'label' => 'Denda buku rusak',
                            'name' => 'denda_rusak',
                            'value' => $data->fine->denda_rusak,
                        ])
                    </div>
                    <div class="col-md-4">
                        @include('pustakawan_views.components.input.input-disable', [
                            'label' => 'Denda buku tidak kembali',
                            'name' => 'denda_tidak_kembali',
                            'value' => $data->fine->denda_tidak_kembali,
                        ])
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
