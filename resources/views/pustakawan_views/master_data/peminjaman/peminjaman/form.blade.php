@extends('layouts.pustakawan_layout')
@section('content')
    <div class="card">
        <div class="card-body">
            @if (isset($peminjaman))
                <form action="{{ route('update_peminjaman', $peminjaman->id) }}" method="post">
                    @method('PUT')
            @else
                <form action="{{ route('store_peminjaman') }}" method="post">
            @endif
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="mb-0">Calon peminjam</label>
                        <select name="peminjam_id" class="tom-select @error('peminjam_id') is-invalid @enderror" required>
                            @if (isset($peminjaman->peminjam_id))
                                <option selected>--Pilih calon peminjam--</option>
                            @endif
                            @foreach ($borrowers as $item)
                                <option value="{{ $item->id }}"
                                    {{ $peminjaman->peminjam_id ?? '' == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('peminjam_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="mb-0">Buku yang ingin dipinjam</label>
                        <select name="buku_id" class="tom-select @error('buku_id') is-invalid @enderror" required>
                            @foreach ($books as $item)
                                @if (isset($peminjaman->buku_id))
                                    <option selected>--Pilih buku--</option>
                                @endif
                                <option value="{{ $item->id }}"
                                    {{ $peminjaman->buku_id ?? '' == $item->id ? 'selected' : '' }}>
                                    {{ $item->judul }}
                                </option>
                            @endforeach
                        </select>
                        @error('buku_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="" class="mb-0">Tanggal pinjam</label>
                    <div class="form-group">
                        <input type="date" name="peminjaman"
                            value="{{ old('peminjaman', $peminjaman->peminjaman ?? date('Y-m-d')) }}" class="form-control"
                            id="" required readonly>
                        @error('peminjaman')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="" class="mb-0">Durasi pinjam</label>
                    <div class="form-group">
                        <input type="date" name="jatuh_tempo"
                            value="{{ old('jatuh_tempo', $peminjaman->jatuh_tempo ?? '') }}"
                            class="form-control @error('jatuh_tempo') is-invalid @enderror" id="" required>
                        @error('jatuh-tempo')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="" class="mb-0">Keterangan (opsional)</label>
                    <div class="form-group">
                        <textarea rows="6" name="keterangan" class="form-control" id="">{{ old('keterangan', $peminjaman->keterangan ?? '') }}</textarea>
                        @error('keterangan')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="konfirmasiCheck" style="cursor: pointer"
                            required>
                        <label class="form-check-label" for="konfirmasiCheck" style="cursor: pointer">Saya
                            yakin
                            data tersebut sudah
                            benar</label>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">Simpan data</button>
            </div>
            </form>
        </div>
    </div>
@endsection
