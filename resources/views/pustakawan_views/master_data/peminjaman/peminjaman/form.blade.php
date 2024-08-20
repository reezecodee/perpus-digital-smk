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
                            @if (!isset($peminjaman))
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
                                @if (!isset($peminjaman))
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
                        <input type="date" min="{{ date('Y-m-d') }}" name="jatuh_tempo"
                            value="{{ old('jatuh_tempo', $peminjaman->jatuh_tempo ?? '') }}"
                            class="form-control @error('jatuh_tempo') is-invalid @enderror" id="" required>
                        @error('jatuh-tempo')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @if(isset($peminjaman))
                <div class="col-md-4">
                    <label for="" class="mb-0">Status peminjaman</label>
                    <div class="form-group">
                        <select name="status"class="form-control" id="" required>
                            @if (!isset($peminjaman))
                                <option selected>--Pilih status peminjaman--</option>
                            @endif
                            <option value="Masa pinjam"
                                {{ old('status', $peminjaman->status ?? '') == 'Masa pinjam' ? 'selected' : '' }}>Masa
                                pinjam
                            </option>
                            <option value="Masa pengembalian"
                                {{ old('status', $peminjaman->status ?? '') == 'Masa pengembalian' ? 'selected' : '' }}>
                                Masa
                                pengembalian</option>
                            <option value="Menunggu persetujuan"
                                {{ old('status', $peminjaman->status ?? '') == 'Menunggu persetujuan' ? 'selected' : '' }}>
                                Menunggu persetujuan</option>
                            <option value="Ditolak"
                                {{ old('status', $peminjaman->status ?? '') == 'Ditolak' ? 'selected' : '' }}>Ditolak
                            </option>
                            <option value="Menunggu diambil"
                                {{ old('status', $peminjaman->status ?? '') == 'Menunggu diambil' ? 'selected' : '' }}>
                                Menunggu
                                diambil</option>
                            <option value="Sudah dikembalikan"
                                {{ old('status', $peminjaman->status ?? '') == 'Sudah dikembalikan' ? 'selected' : '' }}>
                                Sudah
                                dikembalikan</option>
                            <option value="Sudah diulas"
                                {{ old('status', $peminjaman->status ?? '') == 'Sudah diulas' ? 'selected' : '' }}>Sudah
                                diulas
                            </option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @endif
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
