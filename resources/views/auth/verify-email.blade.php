@extends('layouts.auth-layout')
@section('content')
    <div class="max-w-md w-full shadow-lg p-4">
        @if (session('status'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">{{ session('status') }}</span>
            </div>
        @endif
        <div class="flex justify-center">
            <img src="/img/assets/verify_email.webp" class="w-40" alt="">
        </div>
        <div class="flex justify-center mb-3">
            <h3 class="text-lg font-bold">Email verifikasi terkirim</h3>
        </div>
        <p class="text-justify text-sm mb-3 p-2 bg-gray-200 rounded-md">Email verifikasi akun sudah dikirim. Silahkan cek
            inbox email atau spam untuk verifikasi.</p>
        <form action="{{ route('verification.resend') }}" method="post">
            @csrf
            <x-auth.button.submit>
                Kirim ulang
            </x-auth.button.submit>
        </form>
    </div>
@endsection
