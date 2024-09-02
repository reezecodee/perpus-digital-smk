<x-auth-layout :title="$title">
    <div class="max-w-md w-full shadow-lg p-4">
        <div class="flex justify-center mb-3">
            <h3 class="text-xl font-bold">Konfirmasi password</h3>
        </div>
        <p class="text-justify text-sm mb-3 p-2 bg-gray-200 rounded-md">Masukkan password baru dan konfirmasi password
            untuk
            melanjutkan perubahan password</p>
        <form action="{{ route('reset_password') }}" method="post">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">
            <x-auth.input.rectangle label="Password baru" name="password" type="password"
                placeholder="Masukkan password baru kamu" :value="old('password')" />
            <x-auth.input.rectangle label="Konfirmasi password" name="password_confirmation" type="password"
                placeholder="Konfirmasi password kamu" :value="old('password_confirmation')" />
            <x-auth.button.submit>
                Reset password
            </x-auth.button.submit>
        </form>
        <div class="flex justify-start">
            <a href="/" class="text-sm hover:text-red-primary hover:underline">Kembali</a>
        </div>
    </div>
</x-auth-layout>
