<div class="form-group">
    <label for="" class="mb-0">Status kunjungan</label>
    <select name="status_kunjungan" class="form-control @error('status_kunjungan') is-invalid @enderror"
        id="status_kunjungan">
        <option value="" disabled {{ !isset($visit) ? 'selected' : '' }}>--Pilih status--</option>
        <option value="Menunggu persetujuan"
            {{ isset($visit) && $visit->status_kunjungan == 'Menunggu persetujuan' ? 'selected' : '' }}>
            Menunggu persetujuan
        </option>
        <option value="Diterima" {{ isset($visit) && $visit->status_kunjungan == 'Diterima' ? 'selected' : '' }}>
            Diterima
        </option>
        <option value="Ditolak" {{ isset($visit) && $visit->status_kunjungan == 'Ditolak' ? 'selected' : '' }}>
            Ditolak
        </option>
    </select>
    @error('tanggal_kunjungan')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>
