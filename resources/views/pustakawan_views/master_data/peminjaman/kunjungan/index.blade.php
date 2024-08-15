@extends('layouts.pustakawan_layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama pengunjung</th>
                        <th>Keterangan kunjungan</th>
                        <th>Tanggal</th>
                        @can('manajemen peminjaman')
                            <th>Action</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($visits as $item)
                        <tr>
                            <td>{{ $item->peminjam->nama }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>{{ $item->created_at }}</td>
                            @can('manajemen peminjaman')
                                <td>
                                    <a href="">
                                        <button class="btn btn-primary"><i class="fas fa-pen"></i></button>
                                    </a>
                                    <a href="">
                                        <button class="btn btn-success"><i class="fas fa-scroll"></i></button>
                                    </a>
                                    <a href="">
                                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </a>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
