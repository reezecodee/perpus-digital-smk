@extends('layouts.pustakawan_layout')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-bold">Edit Kategori Buku</h4>
                    <hr>
                    <form action="{{ route('update_category', $data->id) }}" method="POST" id="update-form">
                        @method('PUT')
                        @csrf
                        @include('pustakawan_views.components.input.basic', [
                            'label' => 'Nama kategori',
                            'name' => 'nama_kategori',
                            'value' => old('nama_kategori', $data->nama_kategori),
                            'placeholder' => 'Masukkan nama kategori',
                            'type' => 'text',
                            'is_required' => true,
                        ])
                        <div class="form-group">
                            <label for="keterangan">Keterangan (opsional)</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan nama keterangan">{{ old('keterangan', $data->keterangan) }}</textarea>
                            @error('keterangan')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" onclick="confirmUpdate()" class="btn btn-primary">Perbarui</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5>Buku terkait kategori ini</h5>
                    <hr>
                    <table id="data-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Cover buku</th>
                                <th>Judul buku</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/img/cover/' . ($item->cover_buku ?? 'unknown_cover.png')) }}"
                                            alt="" width="60" class="rounded-md" loading="lazy">
                                    </td>
                                    <td>{{ $item->judul }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
