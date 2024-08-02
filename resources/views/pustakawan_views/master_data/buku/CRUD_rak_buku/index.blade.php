@extends('layouts.pustakawan_layout')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-bold">Tambah Rak</h4>
                    <hr>
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="kode_rak">Kode rak</label>
                            <input type="text" name="kode_rak" id="kode_rak" class="form-control"
                                placeholder="Masukkan kode rak" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama rak</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                placeholder="Masukkan nama rak" required>
                        </div>
                        <div class="form-group">
                            <label for="kapasitas">Kapasitas rak</label>
                            <input type="number" name="kapasitas" id="kapasitas" class="form-control"
                                placeholder="Masukkan kapasitas rak" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_buku">Jumlah buku saat ini</label>
                            <input type="number" name="jumlah_buku" id="jumlah_buku" class="form-control"
                                placeholder="Masukkan jumlah buku saat ini" required>
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
                                <th>Nama rak</th>
                                <th>Kode</th>
                                <th>Kapasitas</th>
                                <th>Jumlah buku</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shelves as $item)
                                <tr>
                                    <td>{{ $item->nama_rak }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->kapasitas }}</td>
                                    <td>{{ $item->jml_buku }}</td>
                                    <td>
                                        <button class="btn btn-primary"><i class="fas fa-pen"></i></button>
                                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
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
