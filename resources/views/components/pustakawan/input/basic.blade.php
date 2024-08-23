<div class="form-group">
    <label class="mb-0" for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder ?? '' }}" value="{{ $value }}" class="form-control @error($name) is-invalid @enderror"
        autocomplete="off" {{ $isrequired ? 'required' : '' }} {{ $isreadonly ?? false ? 'readonly' : '' }}>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
