@extends('pustakawan_views.layouts.main')
@section('master_data_content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-bold">Tambah Kategori Buku</h4>
                    <hr>
                    <form action="{{ route('add_category') }}" method="POST" id="add-form">
                        @csrf
                        <x-pustakawan.input.basic label="Nama kategori" name="nama_kategori" :value="old('nama_kategori')"
                            placeholder="Masukkan nama kategori" type="text" :isrequired="true" />
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
                                    <td align="center">
                                        <x-pustakawan.button.edit :route="route('edit_category', $item->id)" />
                                        <x-pustakawan.button.delete :id="$item->id" :route="route('delete_category', $item->id)" />
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
