<x-profile-layout :title="$title">
    <x-slot name="content">
        <div class="self-start w-full border shadow-md rounded-md p-4">
            <h1 class="text-xl font-bold mb-1">Profile saya</h1>
            <hr class="mb-3">
            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100" role="alert">
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif
            <p class="font-semibold mb-2">Foto profile</p>
            <div class="flex gap-4 items-center mb-1">
                <img src="{{ asset('storage/img/profile/' . (auth()->user()->photo ?? 'unknown.jpg')) }}" width="90"
                    id="preview-profile" class="rounded-full">
                <div>
                    <button type="button" data-modal-target="static-modal" data-modal-toggle="static-modal"
                        class="bg-red-primary hover:bg-red-500 rounded-md text-white text-sm p-2 font-bold"><i
                            class="fas fa-upload"></i> Upload
                        foto</button>
                </div>
            </div>
            <x-peminjam.modal.crop-modal />
            <p class="text-sm mb-3">Ukuran foto maksimal sebesar 2MB dan harus berformat jpg, jpeg, atau png.
            </p>
            <form action="{{ route('update_profile', auth()->user()->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-3">
                    <x-peminjam.input.basic label="Username" name="username" type="text" :value="old('username', auth()->user()->username)" />
                    <x-peminjam.input.basic label="NIS" name="nip_nis" type="number" :value="old('nip_nis', auth()->user()->nip_nis)" />
                    <x-peminjam.input.basic label="NISN" name="nisn" type="number" :value="old('nisn', auth()->user()->nisn)" />
                    <x-peminjam.input.basic label="Email" name="email" type="email" :value="old('email', auth()->user()->email)" />
                    <x-peminjam.input.basic label="Telepon" name="telepon" type="number" :value="old('telepon', auth()->user()->telepon)" />
                    <x-peminjam.input.gender-select />
                </div>

                <x-peminjam.button.confirm-btn modaltarget="profile-modal">
                    Simpan
                    perubahan
                </x-peminjam.button.confirm-btn>
                <x-peminjam.modal.confirm-modal question="Apakah Anda yakin ingin mengubah data profile Anda?"
                    okbtn="Ya, tentu" nobtn="Batalkan" modalname="profile-modal" />
            </form>
        </div>
    </x-slot>
</x-profile-layout>
