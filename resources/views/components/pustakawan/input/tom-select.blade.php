<div class="form-group">
    <label for="{{ $name }}" class="mb-0">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="tom-select @error($name) is-invalid @enderror"
        {{ $isrequired ? 'selected' : '' }}>
        @if (!isset($data))
            <option selected>Pilih {{ $label }}</option>
        @endif
        @foreach ($collects as $item)
            @if ($item->nama)
                <option value="{{ $item->id }}" {{ ($data->peminjam_id ?? '') == $item->id ? 'selected' : '' }}>
                    {{ $item->nama }}
                </option>
            @elseif($item->judul)
                <option value="{{ $item->id }}" {{ ($data->buku_id ?? '') == $item->id ? 'selected' : '' }}>
                    {{ $item->judul }}
                </option>
            @elseif($item->nama_rak)
                <option value="{{ $item->id }}" {{ ($data->rak_id ?? '') == $item->id ? 'selected' : '' }}>
                    {{ $item->nama_rak }}
                </option>
            @endif
        @endforeach
    </select>
    @error($name)
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>
