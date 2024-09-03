<div class="form-group">
    <label class="mb-0" for="{{ $name }}">{{ $label }}</label>
    <textarea name="{{ $name }}" id="{{ $name }}" rows="5" placeholder="{{ $placeholder }}" class="form-control @error($name) is-invalid @enderror" autocomplete="off" {{ $isrequired ?? false ? 'required' : '' }}>{{ $value }}</textarea>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
