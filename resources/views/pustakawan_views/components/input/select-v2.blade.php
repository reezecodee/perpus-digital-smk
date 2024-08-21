<div class="form-group">
    <label class="mb-0" for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-control @error($name) is-invalid @enderror" {{ $is_required ? 'required' : '' }}>
        <option value="" disabled {{ old($name, $selected_value) == '' ? 'selected' : '' }}>
            {{ $placeholder ?? 'Pilih ' . $label }}
        </option>
        @foreach ($options as $item)
            <option value="{{ $item->id }}" {{ (old($name, $selected_value) == $item->id) ? 'selected' : '' }}>
                {{ $item->nama_kategori }}
            </option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
