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
                        <th>ISBN</th>
                        <th>Judul</th>
                        <th>Author</th>
                        <th>Penerbit</th>
                        <th>Kategori</th>
                        <th>Lokasi rak</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>02304923232</td>
                        <td>Kisah Ambarawa vs Ambadu</td>
                        <td>Ambatukam</td>
                        <td>Ambamedia</td>
                        <td>Ambagore</td>
                        <td>Ambasatu</td>
                        <td>
                            <button class="btn btn-primary"><i class="fas fa-pen"></i></button>
                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
