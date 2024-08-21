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
                    @include('pustakawan_views.components.input.tom-select', [
                        'label' => 'Pengunjung',
                        'name' => 'pengunjung_id',
                        'data' => $visit,
                        'collects' => $visitors,
                        'is_required' => true,
                    ])
                </div>
                <div class="col-md-4">
                    @include('pustakawan_views.components.input.basic', [
                        'label' => 'Tanggal kunjungan',
                        'name' => 'tanggal_kunjungan',
                        'value' => old('tanggal_kunjungan', $visit->tanggal_kunjungan ?? date('Y-m-d')),
                        'placeholder' => '',
                        'type' => 'date',
                        'is_required' => true,
                    ])
                </div>
                <div class="col-md-4">
                    @include('pustakawan_views.components.input.visit-status')
                </div>
                <div class="col-md-12">
                    @include('pustakawan_views.components.input.textarea', [
                        'label' => 'Keterangan kunjungan',
                        'name' => 'keterangan_kunjungan',
                        'value' => old('keterangan_kunjungan', $visit->keterangan_kunjungan ?? ''),
                        'placeholder' => 'Masukkan keterangan kunjungan',
                        'is_required' => true,
                    ])
                </div>
                <div class="col-md-12">
                    @include('pustakawan_views.components.input.cnfrm-checkbox')
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">Simpan kunjungan</button>
            </div>
            </form>
        </div>
    </div>
@endsection
