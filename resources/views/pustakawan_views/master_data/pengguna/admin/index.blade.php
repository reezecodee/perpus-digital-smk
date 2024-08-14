@extends('layouts.pustakawan_layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <form class="d-inline" action="{{ route('print_pdf_admin') }}" method="post">
                        @csrf
                        <button class="btn btn-primary" type="submit"><i class="fas fa-print"></i></button>
                    </form>
                    <form class="d-inline" action="{{ route('export_admin') }}" method="post">
                        @csrf
                        <button class="btn btn-success" type="submit"><i class="fas fa-file-excel"></i></button>
                    </form>
                </div>
                <div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-success"><i class="fas fa-upload"></i> Import via Excel</button>
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="{{ route('import_admin') }}">Import preview</a>
                            <a class="dropdown-item" href="javascript:void(0)">Import langsung</a>
                            <a class="dropdown-item" href="javascript:void(0)">Download format</a>
                        </div>
                    </div>
                    <a href="{{ route('add_admin') }}">
                        <button class="btn btn-primary"><i class="fas fa-plus"></i> Tambah admin</button>
                    </a>
                </div>
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
                    @foreach ($admins as $item)
                        <tr>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nip_nis }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="{{ route('detail_admin', $item->id) }}" title="Detail">
                                    <button class="btn btn-success"><i class="fas fa-scroll"></i></button>
                                </a>
                                @if ($item->status != 'Aktif')
                                    <a href="{{ route('edit_admin', $item->id) }}" title="Edit">
                                        <button class="btn btn-primary"><i class="fas fa-pen"></i></button>
                                    </a>
                                    <form class="d-inline" action="{{ route('delete_user', $item->id) }}" method="post"
                                        title="Hapus">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
