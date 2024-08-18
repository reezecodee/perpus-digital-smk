@extends('layouts.pustakawan_layout')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-bold">Tambah Rak</h4>
                    <hr>
                    <form action="{{ route('add_shelf') }}" method="POST" id="add-form">
                        @csrf
                        <div class="form-group">
                            <label for="kode_rak">Kode rak</label>
                            <input type="text" name="kode" id="kode_rak"
                                class="form-control @error('kode') is-invalid @enderror" placeholder="Masukkan kode rak"
                                required>
                            @error('kode')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama rak</label>
                            <input type="text" name="nama_rak" id="nama"
                                class="form-control @error('nama_rak') is-invalid @enderror" placeholder="Masukkan nama rak"
                                required>
                            @error('nama_rak')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kapasitas">Kapasitas rak</label>
                            <input type="number" name="kapasitas" id="kapasitas"
                                class="form-control @error('kapasitas') is-invalid @enderror"
                                placeholder="Masukkan kapasitas rak" required>
                            @error('kapasitas')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="button" onclick="confirmAdd()" class="btn btn-primary"><i class="fas fa-plus"></i>
                            Tambahkan</button>
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
                                <th>Buku saat ini</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shelves as $item)
                                <tr>
                                    <td>{{ $item->nama_rak }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->kapasitas }}</td>
                                    <td>{{ $item->seluruh_jumlah_buku }}</td>
                                    <td>
                                        <a href="{{ route('edit_shelf', $item->id) }}" title="Edit">
                                            <button class="btn btn-primary"><i class="fas fa-pen"></i></button>
                                        </a>
                                        <form action="{{ route('delete_shelf', $item->id) }}" method="post" class="inline"
                                            id="delete-form-{{ $item->id }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" onclick="confirmDelete('{{ $item->id }}')"
                                                class="btn btn-danger" title="Hapus"><i class="fas fa-trash"></i></button>
                                        </form>
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
