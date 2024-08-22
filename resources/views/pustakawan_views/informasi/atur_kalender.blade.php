@extends('layouts.pustakawan_layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="sticky-top mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambahkan jadwal</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('add_schedule') }}" method="post" id="add-form">
                                    @csrf
                                    @include('pustakawan_views.components.input.basic', [
                                        'label' => 'Tanggal mulai',
                                        'name' => 'tanggal_mulai',
                                        'value' => old('tanggal_mulai'),
                                        'placeholder' => '',
                                        'type' => 'date',
                                        'is_required' => true,
                                    ])
                                    @include('pustakawan_views.components.input.basic', [
                                        'label' => 'Tanggal selesai',
                                        'name' => 'tanggal_selesai',
                                        'value' => old('tanggal_selesai'),
                                        'placeholder' => '',
                                        'type' => 'date',
                                        'is_required' => true,
                                    ])
                                    @include('pustakawan_views.components.input.basic', [
                                        'label' => 'Keterangan',
                                        'name' => 'keterangan',
                                        'value' => old('keterangan'),
                                        'placeholder' => 'Masukkan keterangan',
                                        'type' => 'text',
                                        'is_required' => true,
                                    ])
                                    @include('pustakawan_views.components.input.pure-select', [
                                        'label' => 'Pilih warna',
                                        'name' => 'warna',
                                        'options' => ['Hijau', 'Kuning', 'Merah'],
                                        'is_required' => true,
                                    ])
                                    <button class="btn btn-primary" type="button" onclick="confirmAdd()">Tambahkan acara</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/calendar.js"></script>
@endsection
