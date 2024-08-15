@extends('layouts.pustakawan_layout')
@section('content')
    @if (session()->has('import_errors'))
        <div class="alert alert-danger">
            <ul>
                @foreach (session('import_errors') as $error)
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
            session()->forget('import_errors'); 
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
                        <form class="d-inline" action="{{ route('print_pdf_users') }}" method="post">
                            @csrf
                            <button class="btn btn-primary" type="submit"><i class="fas fa-print"></i></button>
                        </form>
                        <form class="d-inline" action="{{ route('export_users') }}" method="post">
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
                                <a class="dropdown-item" href="{{ route('import_users', $role) }}">Import preview</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#modal-default"
                                    href="javascript:void(0)">Import langsung</a>
                                <a class="dropdown-item" href="javascript:void(0)">Download format</a>
                            </div>
                        </div>
                        <a href="{{ route('add_user', $role) }}">
                            <button class="btn btn-primary"><i class="fas fa-plus"></i> Tambah {{ $role }}</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endrole
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Import Excel</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('direct_import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <p class="text-center">
                            Pastikan kamu mengupload file dengan format yang sudah ditentukan. Kamu bisa upload file
                            berformat xlsx, xls, dan csv
                        </p>
                        <div class="d-flex justify-content-center w-full mb-3">
                            <img src="https://www.svgrepo.com/show/452084/pdf.svg" width="50" alt=""
                                srcset="" class="d-block">
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="file" class="d-block" name="data_user" accept=".xlsx, xls, csv" id="">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nip_nis }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="{{ route('detail_user', ['role' => $role, 'id' => $item->id]) }}" title="Detail">
                                    <button class="btn btn-success"><i class="fas fa-scroll"></i></button>
                                </a>
                                <a href="{{ route('edit_user', ['role' => $role, 'id' => $item->id]) }}" title="Edit">
                                    <button class="btn btn-primary"><i class="fas fa-pen"></i></button>
                                </a>
                                <form class="d-inline" action="{{ route('delete_user', $item->id) }}" method="post"
                                    title="Hapus">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
