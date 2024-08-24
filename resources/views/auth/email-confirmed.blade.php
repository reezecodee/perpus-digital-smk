@extends('layouts.auth-layout')
@section('content')
    <div class="max-w-md w-full shadow-lg p-4">
        <div class="flex justify-center">
            <img src="/img/assets/email_confirmed.webp" class="w-40" alt="">
        </div>
        <div class="flex justify-center mb-3">
            <h3 class="text-lg font-bold">Email telah terverifikasi</h3>
        </div>
        <p class="text-justify text-sm mb-3 p-2 bg-gray-200 rounded-md">Email Anda telah berhasil di verifikasi, silahkan melanjutkan untuk login.</p>
        <form action="" method="post">
            @csrf
            <button type="submit"
                class="bg-red-primary w-full p-2 text-white font-bold mb-3 rounded-sm hover:bg-red-500">Login</button>
        </form>
    </div>
@endsection
