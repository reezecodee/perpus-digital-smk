@extends('layouts.pustakawan_layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <button class="btn btn-success"><i class="fas fa-print"></i></button>
                </div>
                <div>
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
                        <th>Telepon</th>
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
                            <td>{{ $item->telepon }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="{{ route('detail_admin', $item->id) }}">
                                    <button class="btn btn-success"><i class="fas fa-scroll"></i></button>
                                </a>
                                @if ($item->status != 'Aktif')
                                    <a href="{{ route('edit_admin', $item->id) }}">
                                        <button class="btn btn-primary"><i class="fas fa-pen"></i></button>
                                    </a>
                                    <form class="d-inline" action="{{ route('delete_admin', $item->id) }}" method="post">
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
