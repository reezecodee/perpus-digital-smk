<div class="form-group">
    <label for="" class="mb-0">Status peminjaman</label>
    <div class="form-group">
        <select name="status"class="form-control" id="" required>
            @if (!isset($peminjaman))
                <option selected>--Pilih status peminjaman--</option>
            @endif
            <option value="Masa pinjam"
                {{ old('status', $peminjaman->status ?? '') == 'Masa pinjam' ? 'selected' : '' }}>Masa
                pinjam
            </option>
            <option value="Masa pengembalian"
                {{ old('status', $peminjaman->status ?? '') == 'Masa pengembalian' ? 'selected' : '' }}>
                Masa
                pengembalian</option>
            <option value="Menunggu persetujuan"
                {{ old('status', $peminjaman->status ?? '') == 'Menunggu persetujuan' ? 'selected' : '' }}>
                Menunggu persetujuan</option>
            <option value="Ditolak" {{ old('status', $peminjaman->status ?? '') == 'Ditolak' ? 'selected' : '' }}>Ditolak
            </option>
            <option value="Menunggu diambil"
                {{ old('status', $peminjaman->status ?? '') == 'Menunggu diambil' ? 'selected' : '' }}>
                Menunggu
                diambil</option>
            <option value="Sudah dikembalikan"
                {{ old('status', $peminjaman->status ?? '') == 'Sudah dikembalikan' ? 'selected' : '' }}>
                Sudah
                dikembalikan</option>
            <option value="Sudah diulas"
                {{ old('status', $peminjaman->status ?? '') == 'Sudah diulas' ? 'selected' : '' }}>
                Sudah
                diulas
            </option>
        </select>
        @error('status')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
</div>
