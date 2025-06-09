<div>
    <label class="font-bold mb-1">{{ $label }}</label>
    <input
        class="p-2 rounded-md border @error($name) ring-red-primary border-red-primary @enderror w-full font-semibold focus:ring-red-500 focus:border-red-500"
        value="{{ $value }}" name="{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder ?? '' }}" autocomplete="off" {{ $readonly ?? '' }} {{ $disabled ?? '' }}>
    @error($name)
        <span class="text-red-primary text-sm font-medium">{{ $message }}</span>
    @enderror
</div>
