<div>
    <label class="font-semibold mb-1">Jenis kelamin</label>
    <select
        class="p-2 rounded-md cursor-pointer border @error('jk') ring-red-primary border-red-primary @enderror w-full font-medium focus:ring-red-500 focus:border-red-500"
        name="jk" autocomplete="off">
        <option value="{{ old('jk', auth()->user()->jk) }}" selected>
            {{ old('jk', auth()->user()->jk) }}
        </option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>
    @error('jk')
        <span class="text-red-primary text-sm font-medium">{{ $message }}</span>
    @enderror
</div>
