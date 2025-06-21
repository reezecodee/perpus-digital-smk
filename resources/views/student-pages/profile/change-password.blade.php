<x-profile-layout :title="$title">
    <x-slot name="content">
        <div class="self-start w-full border shadow-md rounded-md p-4">
            <h1 class="text-xl font-bold mb-1">Ganti password</h1>
            <hr class="mb-3">
            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100" role="alert">
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif
            <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="font-semibold">
                    <span class="font-bold">Penting!</span> ubah password secara berkala untuk menghindari
                    transaksi tak terduga.
                </div>
            </div>
            <form action="{{ route('update.password') }}" method="post">
                @csrf
                <div class="grid grid-cols-2 gap-3">
                    <x-borrower.input.basic label="Passoword saat ini" name="current_password" type="text"
                        :value="old('current_password')" placeholder="Masukkan password saat ini" />
                    <x-borrower.input.basic label="Password baru" name="new_password" type="password" :value="old('new_password')"
                        placeholder="Masukkan password baru" />
                    <x-borrower.input.basic label="Konfirmasi password" name="new_password_confirmation" type="password"
                        :value="old('new_password_confirmation')" placeholder="Konfirmasikan password Anda" />
                </div>
                <x-borrower.button.confirm-btn modaltarget="ch-password-modal">
                    Ganti passoword
                </x-borrower.button.confirm-btn>
                <x-borrower.modal.confirm-modal question="Apakah Anda yakin ingin mengubah password Anda?"
                    okbtn="Ya, tentu" nobtn="Batalkan" modalname="ch-password-modal" />
            </form>
        </div>
    </x-slot>
</x-profile-layout>
