<div class="form-group">
    <label class="mb-0" for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}"
        {{ $is_required ? 'required' : '' }}>
        <option selected disabled>{{ $label }}</option>
        @foreach ($options as $option)
            <option value="{{ $option }}">{{ $option }}</option>
        @endforeach
</select>
@error($name)
    <span class="invalid-feedback">{{ $message }}</span>
@enderror
</div>
