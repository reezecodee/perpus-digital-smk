<x-officer-layout :title="$title" :pageTitle="$pageTitle" :name="$name" :type="$type" :btn-name="$btnName" :url="$url">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('update_placement', $placement->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Jumlah Buku</label>
                            <input type="number" value="{{ old('jumlah_buku', $placement->jumlah_buku) }}" class="form-control @error('jumlah_buku') is-invalid @enderror"
                                name="jumlah_buku" placeholder="Masukkan nama rak">
                            @error('jumlah_buku')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Buku Saat Ini</label>
                            <input type="number" value="{{ old('buku_saat_ini', $placement->buku_saat_ini) }}" class="form-control @error('buku_saat_ini') is-invalid @enderror"
                                name="buku_saat_ini" placeholder="Masukkan buku saat ini">
                            @error('buku_saat_ini')
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
</x-officer-layout>