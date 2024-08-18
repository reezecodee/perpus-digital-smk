@extends('layouts.pustakawan_layout')
@section('content')
    @if (session()->has('error'))
        <div class="alert alert-danger">
            <ul>
                @foreach (session('error') as $error)
                    <li>
                        <strong>Baris:</strong> {{ implode(', ', $error['row']) }} <br>
                        <strong>Error:</strong>
                        <ul>
                            @foreach ($error['errors'] as $msg)
                                <li>{{ $msg }}</li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
        @php
            session()->forget('error');
        @endphp
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-bold">Tambah Kategori Buku</h4>
                    <hr>
                    <form action="{{ route('add_category') }}" method="POST" id="add-form">
                        @csrf
                        <div class="form-group">
                            <label for="nama_kategori">Nama kategori</label>
                            <input type="text" name="nama_kategori" value="{{ old('nama_kategori') }}" id="nama_kategori"
                                class="form-control @error('nama_kategori') is-invalid @enderror"
                                placeholder="Masukkan nama kategori" required>
                            @error('nama_kategori')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan (opsional)</label>
                            <textarea name="keterangan" value="{{ old('keterangan') }}" id="keterangan"
                                class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukkan nama keterangan" required></textarea>
                            @error('keterangan')
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
                                    <td>{{ $item->book_count }}</td>
                                    <td>
                                        <a href="{{ route('edit_category', $item->id) }}" title="Edit">
                                            <button class="btn btn-primary"><i class="fas fa-pen"></i></button>
                                        </a>
                                        <form action="{{ route('delete_category', $item->id) }}" method="post"
                                            class="inline" id="delete-form-{{ $item->id }}">
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
