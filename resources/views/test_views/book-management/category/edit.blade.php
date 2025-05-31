<x-test-layout :title="$title" :pageTitle="$pageTitle" :name="$name" :type="$type" :btn-name="$btnName" :url="$url">
    <div class="card">
        <div class="card-body">
            <form action="" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Nama Kategori</label>
                            <input type="text" value="{{ old('nama_kategori', $category->nama_kategori) }}" class="form-control @error('nama_kategori') is-invalid @enderror"
                                name="nama_kategori" placeholder="Masukkan nama kategori">
                            @error('nama_kategori')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Keterangan</label>
                            <input type="text" value="{{ old('keterangan', $category->keterangan) }}" class="form-control @error('keterangan') is-invalid @enderror"
                                name="keterangan" placeholder="Masukkan keterangan">
                            @error('keterangan')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <x-librarian.input.cnfrm-checkbox />
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</x-test-layout>