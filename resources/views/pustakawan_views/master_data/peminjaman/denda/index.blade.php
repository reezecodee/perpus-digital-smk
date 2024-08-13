@extends('layouts.pustakawan_layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Judul buku</th>
                        <th>Denda terlambat</th>
                        <th>Denda buku rusak</th>
                        <th>Denda buku tidak kembali</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fines as $item)
                        <tr>
                            <td>{{ $item->book->judul }}</td>
                            <td>{{ $item->denda_terlambat }}</td>
                            <td>{{ $item->denda_rusak }}</td>
                            <td>{{ $item->denda_tidak_kembali }}</td>
                            <td>
                                <a href="">
                                    <button class="btn btn-primary"><i class="fas fa-pen"></i></button>
                                </a>
                                <a href="">
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
