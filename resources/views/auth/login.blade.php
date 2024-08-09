@extends('layouts.auth_layout')
@section('content')
    <div class="self-center hidden lg:block">
        <img src="https://img.freepik.com/free-vector/sign-concept-illustration_114360-5267.jpg?t=st=1718806418~exp=1718810018~hmac=b65b6b709f7d3ec81cacb521a3676093348e181772a3ba64829862d779c3aea9&w=740"
            width="400" alt="" srcset="">
    </div>
    <div class="self-center p-5 shadow-md max-w-md w-full">
        <div class="text-center">
            <h2 class="text-xl font-bold">Login to Application</h2>
            <span class="font-medium mb-4 block">Masukkan data akun kamu untuk melanjutkan</span>
        </div>
        @session('error')
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">{{ session('error') }}</span>
            </div>
        @endsession
        <form action="" method="post">
            @csrf
            <label for="" class="font-semibold text-sm mb-1 block">Email</label>
            <input type="email" name="email"
                class="border border-gray-400 @error('email') border-red-primary @enderror rounded-sm w-full p-1.5 mb-3"
                value="{{ old('email') }}" required>
            @error('email')
                <div class="text-red-primary text-sm -mt-3 mb-3">{{ $message }}</div>
            @enderror
            <label for="" class="font-semibold text-sm mb-1 block">Password</label>
            <input type="password" name="password"
                class="border border-gray-400 @error('password') border-red-primary @enderror rounded-sm w-full p-1.5 mb-3"
                value="{{ old('password') }}" required>
            @error('password')
                <div class="text-red-primary text-sm -mt-3 mb-3">{{ $message }}</div>
            @enderror
            <div class="flex justify-between mb-3 text-sm">
                <div class="flex items-center gap-2">
                    <input id="default-checkbox" type="checkbox" value=""
                        class="w-4 h-4 text-blue-600 bg-gray-100 rounded focus:ring-blue-500 focus:ring-2 cursor-pointer">
                    <label for="default-checkbox" class="cursor-pointer">Ingat saya</label>
                </div>
                <a href="/lupa-password" class="hover:text-red-primary hover:underline">Lupa password?</a>
            </div>
            <button type="submit"
                class="bg-red-primary w-full p-2 text-white font-bold mb-3 rounded-sm hover:bg-red-500">Login</button>
        </form>
        <div class="flex justify-between">
            <a href="/auth/register" class="text-sm hover:text-red-primary hover:underline">Belum punya akun?</a>
            <a href="/" class="text-sm hover:text-red-primary hover:underline">Kembali</a>
        </div>
    </div>
@endsection
