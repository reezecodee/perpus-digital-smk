<x-auth-layout :title="$title">
    <div class="max-w-md w-full shadow-lg p-4">
        <div class="flex justify-center mb-3">
            <h3 class="text-xl font-bold">Lupa password</h3>
        </div>
        @if (session('status'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">{{ session('status') }}</span>
            </div>
        @endif
        <p class="text-justify text-sm mb-3 p-2 bg-gray-200 rounded-md">Masukkan email kamu yang terdaftar di aplikasi
            dan
            kami akan mengirimkan link
            verifikasi ke email kamu</p>
        <form action="{{ route('verify.sendResetLink') }}" method="post">
            @csrf
            <x-auth.input.rectangle label="Email terdaftar" name="email" type="email"
                placeholder="Masukkan email kamu" :value="old('email')" />
            <x-auth.button.submit>
                Verifikasi
            </x-auth.button.submit>
        </form>
        <div class="flex justify-start">
            <a href="/" class="text-sm hover:text-red-primary hover:underline">Kembali</a>
        </div>
    </div>
</x-auth-layout>
