@extends('layouts.pustakawan_layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <button class="btn btn-success"><i class="fas fa-print"></i></button>
                </div>
                <div>
                    <a href="{{ route('add_peminjam') }}">
                        <button class="btn btn-primary"><i class="fas fa-plus"></i> Tambah peminjam</button>
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
                        <th>NIS</th>
                        <th>NISN</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($borrowers as $item)
                        <tr>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nip_nis }}</td>
                            <td>{{ $item->nisn }}</td>
                            <td>{{ $item->telepon }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <a href="{{ route('detail_peminjam', $item->id) }}">
                                    <button class="btn btn-success"><i class="fas fa-scroll"></i></button>
                                </a>
                                <a href="{{ route('edit_peminjam', $item->id) }}">
                                    <button class="btn btn-primary"><i class="fas fa-pen"></i></button>
                                </a>
                                <form class="d-inline" action="{{ route('delete_peminjam', $item->id) }}" method="post">
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
