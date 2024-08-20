@extends('layouts.pustakawan_layout')
@section('content')
    <div class="card">
        <div class="card-body">
            @if (isset($visit))
                <form action="{{ route('update_visit', $visit->id) }}" method="post">
                    @method('PUT')
                @else
                    <form action="{{ route('store_visit') }}" method="post">
            @endif
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="mb-0">Pengunjung</label>
                        <select name="pengunjung_id" class="tom-select @error('pengunjung_id') is-invalid @enderror"
                            required>
                            @if (!isset($visit))
                                <option selected>--Pilih pengunjung--</option>
                            @endif
                            @foreach ($visitors as $item)
                                <option value="{{ $item->id }}"
                                    {{ $visit->pengunjung_id ?? '' == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('pengunjung_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="mb-0">Tanggal kunjungan</label>
                        <input type="date" name="tanggal_kunjungan"
                            class="form-control @error('tanggal_kunjungan') is-invalid @enderror"
                            value="{{ old('tanggal_kunjungan', $visit->tanggal_kunjungan ?? '') }}" required>
                        @error('tanggal_kunjungan')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="mb-0">Status kunjungan</label>
                        <select name="status_kunjungan" class="form-control @error('status_kunjungan') is-invalid @enderror" id="status_kunjungan">
                            <option value="" disabled {{ !isset($visit) ? 'selected' : '' }}>--Pilih status--</option>
                            <option value="Menunggu persetujuan" {{ isset($visit) && $visit->status_kunjungan == 'Menunggu persetujuan' ? 'selected' : '' }}>
                                Menunggu persetujuan
                            </option>
                            <option value="Diterima" {{ isset($visit) && $visit->status_kunjungan == 'Diterima' ? 'selected' : '' }}>
                                Diterima
                            </option>
                            <option value="Ditolak" {{ isset($visit) && $visit->status_kunjungan == 'Ditolak' ? 'selected' : '' }}>
                                Ditolak
                            </option>
                        </select>                        
                        @error('tanggal_kunjungan')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="mb-0">Keterangan kunjungan</label>
                        <textarea name="keterangan_kunjungan" class="form-control @error('keterangan_kunjungan') is-invalid @enderror"
                            id="" rows="6" placeholder="Masukkan keterangan kunjungan" required>{{ old('keterangan_kunjungan', $visit->keterangan_kunjungan ?? '') }}</textarea>
                        @error('keterangan_kunjungan')
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
                <button class="btn btn-primary" type="submit">Simpan kunjungan</button>
            </div>
            </form>
        </div>
    </div>
@endsection
