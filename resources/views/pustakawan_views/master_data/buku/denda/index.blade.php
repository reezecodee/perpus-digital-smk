@extends('layouts.pustakawan_layout')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @role('Admin')
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <form class="d-inline" action="" method="post">
                            @csrf
                            <button class="btn btn-primary" type="submit"><i class="fas fa-print"></i></button>
                        </form>
                        <form class="d-inline" action="" method="post">
                            @csrf
                            <button class="btn btn-success" type="submit"><i class="fas fa-file-excel"></i></button>
                        </form>
                    </div>
                    <div>
                        <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-primary"><i
                                class="fas fa-plus"></i> Tambah denda</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Buku yang belum memiliki data denda</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="data-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Judul buku</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($without_fines as $item)
                                    <tr>
                                        <td>{{ $item->judul }}</td>
                                        <td>
                                            <a href="{{ route('edit_book', ['format' => 'fisik', 'id' => $item->id]) }}">Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                </div>

            </div>

        </div>
    @endrole
    <div class="card">
        <div class="card-body">
            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Judul buku</th>
                        <th>Denda terlambat</th>
                        <th>Denda buku rusak</th>
                        <th>Denda buku tidak kembali</th>
                        @can('manajemen peminjaman')
                            <th>Action</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fines as $item)
                        <tr>
                            <td>{{ $item->book->judul }}</td>
                            <td>{{ $item->denda_terlambat }}</td>
                            <td>{{ $item->denda_rusak }}</td>
                            <td>{{ $item->denda_tidak_kembali }}</td>
                            @can('manajemen peminjaman')
                                <td>
                                    <a href="{{ route('edit_book', ['format' => 'fisik', 'id' => $item->book->id]) }}"
                                        title="Edit">
                                        <button class="btn btn-primary"><i class="fas fa-pen"></i></button>
                                    </a>
                                    <form id="delete-form-{{ $item->id }}" class="d-inline"
                                        action="{{ route('delete_fine', $item->id) }}" method="post" title="Hapus">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" onclick="confirmDelete('{{ $item->id }}')"
                                            class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
