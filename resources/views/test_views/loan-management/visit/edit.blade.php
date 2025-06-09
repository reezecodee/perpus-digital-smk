<x-test-layout :title="$title" :pageTitle="$pageTitle" :name="$name" :type="$type" :btn-name="$btnName" :url="$url">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('update_visit', $visit->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Status Kunjungan</label>
                            <select name="status_kunjungan"
                                class="form-select @error('status_kunjungan') is-invalid @enderror">
                                <option value="">-- Pilih Status Kunjungan --</option>
                                <option value="Menunggu Persetujuan" {{ old('status_kunjungan', $visit->
                                    status_kunjungan) === 'Menunggu persetujuan' ? 'selected' : '' }}>
                                    Menunggu Persetujuan</option>
                                <option value="Diterima" {{ old('status_kunjungan', $visit->status_kunjungan) ===
                                    'Diterima' ? 'selected' : '' }}>
                                    Diterima</option>
                                <option value="Ditolak" {{ old('status_kunjungan', $visit->status_kunjungan) ===
                                    'Ditolak' ? 'selected' : '' }}>
                                    Ditolak</option>
                            </select>
                            @error('status_kunjungan')
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