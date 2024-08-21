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
                        @include('pustakawan_views.components.input.basic', [
                            'label' => 'Kode rak',
                            'name' => 'kode',
                            'value' => old('kode', $data->kode),
                            'placeholder' => 'Masukkan kode rak',
                            'type' => 'text',
                            'is_required' => true,
                        ])
                        @include('pustakawan_views.components.input.basic', [
                            'label' => 'Nama rak',
                            'name' => 'nama_rak',
                            'value' => old('nama_rak', $data->nama_rak),
                            'placeholder' => 'Masukkan nama rak',
                            'type' => 'text',
                            'is_required' => true,
                        ])
                        @include('pustakawan_views.components.input.basic', [
                            'label' => 'Kapasitas rak',
                            'name' => 'kapasitas',
                            'value' => old('kapasitas', $data->kapasitas),
                            'placeholder' => 'Masukkan kapasitas rak',
                            'type' => 'text',
                            'is_required' => true,
                        ])
                        <button type="submit" onclick="confirmUpdate()" class="btn btn-primary">Perbarui</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
