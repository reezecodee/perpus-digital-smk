<x-officer-layout :title="$title" :pageTitle="$pageTitle" :name="$name" :type="$type" :btn-name="$btnName">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('update_peminjaman', $loan->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Siswa Peminjam</label>
                            <select name="peminjam_id" class="form-select @error('peminjam_id') is-invalid @enderror">
                                <option value="">-- Pilih Peminjam --</option>
                                @foreach($students as $item)
                                <option value="{{ $item->id }}" {{ old('peminjam_id', $loan->peminjam_id) == $item->id ? 'selected' :
                                    '' }}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('peminjam_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Buku yang Ingin Dipinjam</label>
                            <select name="buku_id" class="form-select @error('buku_id') is-invalid @enderror">
                                <option value="">-- Pilih Buku --</option>
                                @foreach($books as $item)
                                <option value="{{ $item->id }}" {{ old('buku_id', $loan->buku_id) == $item->id ? 'selected' :
                                    '' }}>{{ $item->judul }}</option>
                                @endforeach
                            </select>
                            @error('buku_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Ambil Di Rak</label>
                            <select name="penempatan_id"
                                class="form-select @error('penempatan_id') is-invalid @enderror">
                                <option value="">-- Pilih Rak --</option>
                                @foreach($placements as $item)
                                <option value="{{ $item->id }}" {{ old('penempatan_id', $loan->penempatan_id) == $item->id ? 'selected'
                                    :
                                    '' }}>{{ $item->shelf->nama_rak }}</option>
                                @endforeach
                            </select>
                            @error('penempatan_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Tanggal Peminjaman</label>
                            <input type="date" value="{{ old('peminjaman', $loan->peminjaman) }}"
                                class="form-control @error('peminjaman') is-invalid @enderror" name="peminjaman"
                                placeholder="Masukkan tanggal peminjaman">
                            @error('peminjaman')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Tanggal Pengembalian</label>
                            <input type="date" value="{{ old('pengembalian', $loan->pengembalian) }}"
                                class="form-control @error('pengembalian') is-invalid @enderror" name="pengembalian"
                                placeholder="Masukkan tanggal pengembalian">
                            @error('pengembalian')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Jatuh Tempo</label>
                            <input type="date" value="{{ old('jatuh_tempo', $loan->jatuh_tempo) }}"
                                class="form-control @error('jatuh_tempo') is-invalid @enderror" name="jatuh_tempo"
                                placeholder="Masukkan tanggal jatuh tempo">
                            @error('jatuh_tempo')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Keterangan</label>
                            <textarea cols="5" rows="5" class="form-control @error('keterangan') is-invalid @enderror"
                                name="keterangan"
                                placeholder="Masukkan keterangan peminjaman">{{ old('keterangan', $loan->keterangan) }}</textarea>
                            @error('keterangan')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Status Peminjaman</label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="">-- Pilih Status Peminjaman --</option>
                                <option value="Menunggu persetujuan" {{ old('status', $loan->status) == 'Menunggu persetujuan'
                                    ? 'selected' : '' }}>
                                    Menunggu persetujuan</option>
                                <option value="Masa pinjam" {{ old('status', $loan->status) == 'Masa pinjam' ? 'selected' : '' }}>
                                    Masa pinjam</option>
                                <option value="Menunggu diambil" {{ old('status', $loan->status) == 'Menunggu diambil' ? 'selected' : ''
                                    }}>
                                    Menunggu diambil</option>
                                <option value="Ditolak" {{ old('status', $loan->status)=='Ditolak' ? 'selected' : '' }}>
                                    Ditolak</option>
                                <option value="Sudah dikembalikan" {{ old('status', $loan->status)=='Sudah dikembalikan' ? 'selected' : '' }}>
                                    Sudah dikembalikan</option>
                                <option value="Terkena denda" {{ old('status', $loan->status)=='Terkena denda' ? 'selected' : '' }}>
                                    Terkena denda</option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Keterangan Denda</label>
                            <select name="keterangan_denda" class="form-select @error('keterangan_denda') is-invalid @enderror">
                                <option value="">-- Pilih Keterangan Denda Peminjaman --</option>
                                <option value="Tidak ada" {{ old('keterangan_denda', $loan->keterangan_denda) == 'Tidak ada'
                                    ? 'selected' : '' }}>
                                    Tidak ada</option>
                                <option value="Denda buku rusak" {{ old('keterangan_denda', $loan->keterangan_denda) == 'Denda buku rusak'
                                    ? 'selected' : '' }}>
                                    Denda buku rusak</option>
                                <option value="Denda buku terlambat" {{ old('keterangan_denda', $loan->keterangan_denda) == 'Denda buku terlambat'
                                    ? 'selected' : '' }}>
                                    Denda buku terlambat</option>
                                <option value="Denda buku tidak kembali" {{ old('keterangan_denda', $loan->keterangan_denda) == 'Denda buku tidak kembali'
                                    ? 'selected' : '' }}>
                                    Denda buku tidak kembali</option>
                            </select>
                            @error('keterangan_denda')
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
</x-officer-layout>