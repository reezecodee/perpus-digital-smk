@extends('layouts.pustakawan_layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <a href="">
                    <button class="btn btn-primary"><i class="fas fa-plus"></i> Tambah buku baru</button>
                </a>
            </div>
            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Kode buku</th>
                        <th>Judul</th>
                        <th>Author</th>
                        <th>Penerbit</th>
                        <th>ISBN</th>
                        <th>Jumlah halaman</th>
                        <th>Bahasa</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $item)
                        <tr>
                            <td>{{ $item->kode_buku }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->author }}</td>
                            <td>{{ $item->penerbit }}</td>
                            <td>{{ $item->isbn }}</td>
                            <td>{{ $item->Jml_halaman }}</td>
                            <td>{{ $item->bahasa }}</td>
                            <td>{{ $item->category->nama_kategori }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <button class="btn btn-primary"><i class="fas fa-pen"></i></button>
                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
