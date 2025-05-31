<x-test-layout :title="$title" :pageTitle="$pageTitle" :name="$name" :type="$type" :btn-name="$btnName" :url="$url">
    <div class="card">
        <div class="card-body">
            <form action="" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Nama Rak</label>
                            <input type="text" value="{{ old('nama_rak', $shelf->nama_rak) }}" class="form-control @error('nama_rak') is-invalid @enderror"
                                name="nama_rak" placeholder="Masukkan nama rak">
                            @error('nama_rak')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Kode Rak</label>
                            <input type="text" value="{{ old('kode', $shelf->kode) }}" class="form-control @error('kode') is-invalid @enderror"
                                name="kode" placeholder="Masukkan kode rak">
                            @error('kode')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Kapasitas</label>
                            <input type="number" value="{{ old('kapasitas', $shelf->kapasitas) }}" class="form-control @error('kapasitas') is-invalid @enderror"
                                name="kapasitas" placeholder="Masukkan kapasitas rak">
                            @error('kapasitas')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <x-librarian.input.cnfrm-checkbox />
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</x-test-layout>