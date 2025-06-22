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
                        class="bg-red-primary hover:bg-red-500 rounded-md text-white text-sm p-2 font-bold hvr-shrink"><i
                            class="fas fa-upload"></i> Upload
                        foto</button>
                </div>
            </div>
            <x-borrower.modal.crop-modal />
            <p class="text-sm mb-3">Ukuran foto maksimal sebesar 2MB dan harus berformat jpg, jpeg, atau png.
            </p>
            <form action="{{ route('update.profile') }}" method="post">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-3 mb-2">
                    <x-borrower.input.basic label="Username" name="username" type="text" :value="old('username', auth()->user()->username)" />
                    <x-borrower.input.basic label="Nama" type="text" :readonly="'readonly'" :disabled="'disabled'" :value="old('nama', auth()->user()->nama)" />
                    <x-borrower.input.basic label="NIS" type="number" :value="auth()->user()->nip_nis" :readonly="'readonly'" :disabled="'disabled'" />
                    <x-borrower.input.basic label="NISN" type="number" :readonly="'readonly'" :disabled="'disabled'" :value="auth()->user()->nisn" :readonly="'readonly'" :disabled="'disabled'" />
                    <x-borrower.input.basic label="Email" type="email" :readonly="'readonly'" :disabled="'disabled'" :value="old('email', auth()->user()->email)" />
                    <x-borrower.input.basic label="Telepon" type="number" :readonly="'readonly'" :disabled="'disabled'" :value="auth()->user()->telepon" />
                    <x-borrower.input.basic label="Jenis kelamin" type="text" :readonly="'readonly'" :disabled="'disabled'" :value="auth()->user()->jk" :readonly="'readonly'" :disabled="'disabled'" />
                </div>
                <x-borrower.input.textarea label="Alamat" :readonly="'readonly'" :disabled="'disabled'" :value="old('alamat', auth()->user()->alamat)" />
                <x-borrower.button.confirm-btn modaltarget="profile-modal">
                    Simpan
                    perubahan
                </x-borrower.button.confirm-btn>
                <x-borrower.modal.confirm-modal question="Apakah Anda yakin ingin mengubah data profile Anda?"
                    okbtn="Ya, tentu" nobtn="Batalkan" modalname="profile-modal" />
            </form>
        </div>
    </x-slot>
</x-profile-layout>
