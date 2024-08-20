@extends('layouts.pustakawan_layout')
@section('content')
    @if (session()->has('error'))
        <div class="alert alert-danger">
            <ul>
                @foreach (session('error') as $error)
                    <li>
                        <strong>Baris:</strong> {{ implode(', ', $error['row']) }} <br>
                        <strong>Error:</strong>
                        <ul>
                            @foreach ($error['errors'] as $msg)
                                <li>{{ $msg }}</li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
        @php
            session()->forget('error');
        @endphp
    @endif

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
                        <div class="btn-group">
                            <button type="button" class="btn btn-success"><i class="fas fa-upload"></i> Import via
                                Excel</button>
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" data-toggle="modal" data-target="#modal-default"
                                    href="javascript:void(0)">Import langsung</a>
                                <a class="dropdown-item" href="javascript:void(0)">Download format</a>
                            </div>
                        </div>
                        <a href="{{ route('add_kunjungan') }}">
                            <button class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
                        </a>
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
                        <th>Nama pengunjung</th>
                        <th>Tanggal kunjungan</th>
                        <th>Keterangan kunjungan</th>
                        @can('manajemen peminjaman')
                            <th>Action</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($visits as $item)
                        <tr>
                            <td>{{ $item->peminjam->nama }}</td>
                            <td>{{ $item->tanggal_kunjungan }}</td>
                            <td>{{ $item->keterangan_kunjungan }}</td>
                            @can('manajemen peminjaman')
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info">Action</button>
                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon"
                                            data-toggle="dropdown" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu" style="">
                                            <a class="dropdown-item" href="{{ route('edit_kunjungan', $item->id) }}">Edit</a>
                                            <form action="{{ route('delete_visit', $item->id) }}" method="post"
                                                id="delete-form-{{ $item->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="dropdown-item" href="javascript:void(0)"
                                                    onclick="confirmDelete('{{ $item->id }}')">Hapus</button>
                                            </form>
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
