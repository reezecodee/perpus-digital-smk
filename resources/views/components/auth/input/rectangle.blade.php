<label for="{{ $name }}" class="font-bold text-sm mb-1 block">{{ $label }}</label>
<input type="{{ $type }}" name="{{ $name }}"
    class="border font-semibold border-gray-400 @error($name) border-red-primary @enderror rounded-sm w-full p-1.5 mb-3 focus:ring-red-500 focus:border-red-500"
    value="{{ $value }}" placeholder="{{ $placeholder }}" autocomplete="off" required>
@error($name)
    <div class="text-red-primary text-sm -mt-3 mb-3">{{ $message }}</div>
@enderror
