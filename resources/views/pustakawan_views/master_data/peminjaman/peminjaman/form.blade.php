@extends('layouts.pustakawan-layout')
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
                    <x-pustakawan.input.tom-select label="Calon peminjam" name="peminjam_id" :data="$peminjaman"
                        :collects="$borrowers" :isrequired="true" />
                </div>
                <div class="col-md-4">
                    <x-pustakawan.input.tom-select label="Buku yang ingin dipinjam" name="buku_id" :data="$peminjaman"
                        :collects="$books" :isrequired="true" />
                </div>
                <div class="col-md-4">
                    <x-pustakawan.input.basic label="Tanggal pinjam" name="peminjaman" :value="old('peminjaman', $peminjaman->peminjaman ?? date('Y-m-d'))" placeholder=""
                        type="date" :isrequired="false" isreadonly="true" />
                </div>
                <div class="col-md-4">
                    <x-pustakawan.input.date-with-min label="Durasi pinjam" name="jatuh_tempo" :value="old('jatuh_tempo', $peminjaman->jatuh_tempo ?? '')"
                        placeholder="" type="date" :mindate="date('Y-m-d')" isrequired="true" />
                </div>
                @if (isset($peminjaman))
                    <div class="col-md-4">
                        <x-pustakawan.input.status-select />
                    </div>
                @endif
                <div class="col-md-12">
                    <x-pustakawan.input.textarea label="Keterangan (opsional)" name="keterangan" :value="old('keterangan', $data->keterangan ?? '')" placeholder="Masukkan keterangan pinjam" :isrequired="false" />
                </div>
                <div class="col-md-12">
                    <x-pustakawan.input.cnfrm-checkbox />
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">Simpan data</button>
            </div>
            </form>
        </div>
    </div>
@endsection
