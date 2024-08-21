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
                    @include('pustakawan_views.components.input.tom-select', [
                        'label' => 'Calon peminjam',
                        'name' => 'peminjam_id',
                        'data' => $peminjaman,
                        'collects' => $borrowers,
                        'is_required' => true,
                    ])
                </div>
                <div class="col-md-4">
                    @include('pustakawan_views.components.input.tom-select', [
                        'label' => 'Buku yang ingin dipinjam',
                        'name' => 'buku_id',
                        'data' => $peminjaman,
                        'collects' => $books,
                        'is_required' => true,
                    ])
                </div>
                <div class="col-md-4">
                    @include('pustakawan_views.components.input.basic', [
                        'label' => 'Tanggal pinjam',
                        'name' => 'peminjaman',
                        'value' => old('peminjaman', $peminjaman->peminjaman ?? date('Y-m-d')),
                        'placeholder' => '',
                        'type' => 'date',
                        'is_required' => false,
                        'is_readonly' => true
                    ])
                </div>
                <div class="col-md-4">
                    @include('pustakawan_views.components.input.date-with-min', [
                        'label' => 'Durasi pinjam',
                        'name' => 'jatuh_tempo',
                        'value' => old('jatuh_tempo', $peminjaman->jatuh_tempo ?? ''),
                        'placeholder' => '',
                        'type' => 'date',
                        'min_date' => date('Y-m-d'),
                        'is_required' => true,
                    ])
                </div>
                @if (isset($peminjaman))
                    <div class="col-md-4">
                        @include('pustakawan_views.components.input.status-select')
                    </div>
                @endif
                <div class="col-md-12">
                    @include('pustakawan_views.components.input.textarea', [
                        'label' => 'Keterangan (opsional)',
                        'name' => 'keterangan',
                        'value' => old('keterangan', $data->keterangan ?? ''),
                        'placeholder' => 'Masukkan keterangan peminjaman',
                        'is_required' => false,
                    ])
                </div>
                <div class="col-md-12">
                    @include('pustakawan_views.components.input.cnfrm-checkbox')
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">Simpan data</button>
            </div>
            </form>
        </div>
    </div>
@endsection
