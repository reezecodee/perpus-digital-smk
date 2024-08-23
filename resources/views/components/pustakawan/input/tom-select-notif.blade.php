<div class="form-group d-flex align-items-center">
    <span class="mr-2"><b>Penerima:</b></span>
    <select name="{{ $name }}" class="form-control tom-select" required>
        <option disabled selected>{{ $placeholder }}</option>
        @foreach ($options as $option)
            <option value="{{ $option->id }}">{{ $option->nama }}</option>
        @endforeach
    </select>
    @error($name)
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>
