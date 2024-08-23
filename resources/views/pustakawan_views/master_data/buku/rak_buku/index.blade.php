@extends('pustakawan_views.layouts.main')
@section('master_data_content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-bold">Tambah Rak</h4>
                    <hr>
                    <form action="{{ route('add_shelf') }}" method="post" id="add-form">
                        @csrf
                        <x-pustakawan.input.basic label="Kode rak" name="kode" :value="old('kode')"
                            placeholder="Masukkan kode rak" type="text" :isrequired="true" />
                        <x-pustakawan.input.basic label="Nama rak" name="nama_rak" :value="old('nama_rak')"
                            placeholder="Masukkan nama rak" type="text" :isrequired="true" />
                        <x-pustakawan.input.basic label="Kapasitas rak" name="kapasitas" :value="old('kapasitas')"
                            placeholder="Masukkan kapasitas rak" type="number" :isrequired="true" />
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
                                <th>Nama rak</th>
                                <th>Kode</th>
                                <th>Kapasitas</th>
                                <th>Buku saat ini</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shelves as $item)
                                <tr>
                                    <td>{{ $item->nama_rak }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->kapasitas }}</td>
                                    <td>{{ $item->seluruh_jumlah_buku }}</td>
                                    <td>
                                        <x-pustakawan.button.edit :route="route('edit_shelf', $item->id)" />
                                        <x-pustakawan.button.delete :id="$item->id" :route="route('delete_shelf', $item->id)" />
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
