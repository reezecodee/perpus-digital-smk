@extends('layouts.auth-layout')
@section('content')
    <div class="max-w-md w-full shadow-lg p-4">
        <div class="flex justify-center mb-3">
            <h3 class="text-xl font-bold">Konfirmasi password</h3>
        </div>
        <p class="text-justify text-sm mb-3 p-2 bg-gray-200 rounded-md">Masukkan password baru dan konfirmasi password untuk melanjutkan perubahan password</p>
        <form action="{{ route('reset_password') }}" method="post">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}"> 
            <label for="" class="font-bold text-sm mb-1 block">Password baru</label>
            <input type="password" name="password"
                class="border border-gray-400 @error('password') border-red-primary @enderror rounded-sm w-full p-1.5 mb-3"
                value="{{ old('password') }}" placeholder="Masukkan password baru kamu" required>
            @error('password')
                <div class="text-red-primary text-sm -mt-3 mb-3">{{ $message }}</div>
            @enderror
            <label for="" class="font-bold text-sm mb-1 block">Konfirmasi password</label>
            <input type="password" name="password_confirmation"
                class="border border-gray-400 @error('password_confirmation') border-red-primary @enderror rounded-sm w-full p-1.5 mb-3"
                value="{{ old('password_confirmation') }}" placeholder="Konfimasi password kamu" required>
            @error('password_confirmation')
                <div class="text-red-primary text-sm -mt-3 mb-3">{{ $message }}</div>
            @enderror
            <button type="submit"
                class="bg-red-primary w-full p-2 text-white font-bold mb-3 rounded-sm hover:bg-red-500">Reset password</button>
        </form>
        <div class="flex justify-start">
            <a href="/" class="text-sm hover:text-red-primary hover:underline">Kembali</a>
        </div>
    </div>
@endsection
