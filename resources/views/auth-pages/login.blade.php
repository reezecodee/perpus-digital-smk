<x-auth-layout :title="$title">
    <div class="self-center hidden lg:block">
        <img src="https://img.freepik.com/free-vector/sign-concept-illustration_114360-5267.jpg?t=st=1718806418~exp=1718810018~hmac=b65b6b709f7d3ec81cacb521a3676093348e181772a3ba64829862d779c3aea9&w=740"
            width="400" alt="" srcset="">
    </div>
    <div class="self-center p-5 shadow-md max-w-md w-full">
        <div class="text-center">
            <h2 class="text-xl font-bold">Login to Application</h2>
            <span class="font-medium mb-4 block">Masukkan data akun kamu untuk melanjutkan</span>
        </div>
        @if (session('error'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <span class="font-medium">{{ session('error') }}</span>
            </div>
        @endif
        @if (session('status'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">{{ session('status') }}</span>
            </div>
        @endif
        <form action="" method="post">
            @csrf
            <x-auth.input.rectangle name="email" type="email" label="Email" placeholder="Masukkan email"
                :value="old('email')" />
            <x-auth.input.rectangle name="password" type="password" label="Password" placeholder="Masukkan password"
                :value="old('password')" />
            <div class="flex justify-between mb-3 text-sm">
                <div class="flex items-center gap-2">
                    <x-auth.input.remember />
                </div>
                <a href="{{ route('show_forgot_password') }}" class="hover:text-red-primary hover:underline">Lupa
                    password?</a>
            </div>
            <x-auth.button.submit>
                Login
            </x-auth.button.submit>
        </form>
        <div class="flex justify-between">
            <a href="/auth/register" class="text-sm hover:text-red-primary hover:underline">Belum punya akun?</a>
            <a href="/" class="text-sm hover:text-red-primary hover:underline">Kembali</a>
        </div>
    </div>
</x-auth-layout>
