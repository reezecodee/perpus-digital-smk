@extends('layouts.pustakawan_layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Judul buku</th>
                        <th>Tgl pinjam</th>
                        <th>Dikembalikan</th>
                        <th>Jatuh tempo</th>
                        <th>Status</th>
                        @can('manajemen peminjaman')
                            <th>Action</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($borrowers as $item)
                        <tr>
                            <td>{{ $item->peminjam->nama }}</td>
                            <td class="truncate-text">{{ $item->book->judul }}</td>
                            <td>{{ $item->peminjaman }}</td>
                            <td>{{ $item->pengembalian }}</td>
                            <td>{{ $item->jatuh_tempo }}</td>
                            <td>{{ $item->status }}</td>
                            @can('manajemen peminjaman')
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info">Action</button>
                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon"
                                            data-toggle="dropdown" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu" style="">
                                            <a class="dropdown-item" href="#">Detail</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
