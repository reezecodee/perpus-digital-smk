@extends('layouts.pustakawan_layout')
@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-bold">Edit Kategori Buku</h4>
                    <hr>
                    <form action="{{ route('update_shelf', $data->id) }}" method="POST" id="update-form">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="kode_rak">Kode rak</label>
                            <input type="text" name="kode" id="kode_rak" class="form-control @error('kode') is-invalid @enderror"
                                value="{{ old('kode', $data->kode) }}" placeholder="Masukkan kode rak" required>
                            @error('kode_rak')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_rak">Nama rak</label>
                            <input type="text" name="nama_rak" id="nama_rak" class="form-control @error('nama_rak') is-invalid @enderror"
                                value="{{ old('nama_rak', $data->nama_rak) }}" placeholder="Masukkan nama rak" required>
                            @error('nama_rak')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kapasitas">Kapasitas rak</label>
                            <input type="text" name="kapasitas" id="kapasitas" class="form-control @error('kapasitas') is-invalid @enderror"
                                value="{{ old('kapasitas', $data->kapasitas) }}" placeholder="Masukkan kapasitas rak"
                                required>
                            @error('kapasitas')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" onclick="confirmUpdate()" class="btn btn-primary">Perbarui</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
