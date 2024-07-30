@extends('layouts.pustakawan_layout')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-bold">Tambah Kategori Buku</h4>
                    <hr>
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="kode_kategori">Kode kategori</label>
                            <input type="text" name="kode_kategori" id="kode_kategori" class="form-control" placeholder="Masukkan kode kategori" required>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input type="text" name="kategori" id="kategori" class="form-control" placeholder="Masukkan nama kategori" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table id="data-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Kode kategori</th>
                                <th>Nama kaegori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2342342</td>
                                <td>Ambagori</td>
                                <td>
                                    <button class="btn btn-primary"><i class="fas fa-pen"></i></button>
                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
