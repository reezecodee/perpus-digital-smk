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
                            <label for="nama_kategori">Nama kategori</label>
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control"
                                placeholder="Masukkan nama kategori" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan (opsional)</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan nama keterangan" required></textarea>
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
                                <th>Nama kategori</th>
                                <th>Keterangan</th>
                                <th>Buku terkait</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                                <tr>
                                    <td>{{ $item->nama_kategori }}</td>
                                    <td>{{ $item->keterangan ?? 'Tidak ada' }}</td>
                                    <td>{{ '' }}</td>
                                    <td>
                                        <a href="" title="Edit">
                                            <button class="btn btn-primary"><i class="fas fa-pen"></i></button>
                                        </a>
                                        <button class="btn btn-danger" title="Hapus"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
