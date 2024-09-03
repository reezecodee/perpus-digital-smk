<div class="form-group">
    <label class="mb-0" for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-control @error($name) is-invalid @enderror" {{ $isrequired ?? false ? 'required' : '' }}>
        <option value="" disabled {{ old($name) == '' ? 'selected' : '' }}>
            {{ $placeholder ?? 'Pilih ' . $label }}
        </option>
        @foreach ($options as $item)
            <option value="{{ $item }}" {{ (old($name) ?? $selectedvalue) == $item ? 'selected' : '' }}>
                {{ $item }}
            </option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
