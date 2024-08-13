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
                        <th>Judul</th>
                        <th>Author</th>
                        <th>ISBN</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $item)
                        <tr>
                            <td class="truncate-text">{{ $item->judul }}</td>
                            <td>{{ $item->author }}</td>
                            <td>{{ $item->isbn }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="" title="Detail">
                                    <button class="btn btn-success"><i class="fas fa-scroll"></i></button>
                                </a>
                                <a href="" title="Edit">
                                    <button class="btn btn-primary"><i class="fas fa-pen"></i></button>
                                </a>
                                <a href="" title="Hapus">
                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
