<div>
    <label class="font-bold mb-1">{{ $label }}</label>
    <textarea
        class="p-2 rounded-md border @error($name ?? false) ring-red-primary border-red-primary @enderror w-full font-semibold focus:ring-red-500 focus:border-red-500"
        name="{{ $name ?? '' }}" placeholder="{{ $placeholder ?? '' }}" autocomplete="off" {{ $readonly ?? '' }} {{ $disabled ?? '' }}>{{ $value }}</textarea>
    @error($name ?? false)
        <span class="text-red-primary text-sm font-medium">{{ $message }}</span>
    @enderror
</div>
