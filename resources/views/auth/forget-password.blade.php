@extends('layouts.auth-layout')
@section('content')
    <div class="max-w-md w-full shadow-lg p-4">
        <div class="flex justify-center mb-3">
            <h3 class="text-xl font-bold">Lupa password</h3>
        </div>
        <p class="text-justify text-sm mb-3 p-2 bg-gray-200 rounded-md">Masukkan email kamu yang terdaftar di aplikasi dan kami akan mengirimkan link
            verifikasi ke email kamu</p>
        <form action="{{ route('send_email_reset') }}" method="post">
            @csrf
            <label for="" class="font-bold text-sm mb-1 block">Email</label>
            <input type="email" name="email"
                class="border border-gray-400 @error('email') border-red-primary @enderror rounded-sm w-full p-1.5 mb-3"
                value="{{ old('email') }}" placeholder="Masukkan email kamu" required>
            @error('email')
                <div class="text-red-primary text-sm -mt-3 mb-3">{{ $message }}</div>
            @enderror
            <button type="submit"
                class="bg-red-primary w-full p-2 text-white font-bold mb-3 rounded-sm hover:bg-red-500">Verifikasi</button>
        </form>
        <div class="flex justify-start">
            <a href="/" class="text-sm hover:text-red-primary hover:underline">Kembali</a>
        </div>
    </div>
@endsection
