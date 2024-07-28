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
        <form action="" method="post">
            <label for="" class="font-semibold text-sm mb-1 block">NIP Guru/NIS Siswa</label>
            <input type="email" name="email" id="" class="border border-gray-400 rounded-sm w-full p-1.5 mb-3"
                required>
            <label for="" class="font-semibold text-sm mb-1 block">Password</label>
            <input type="password" name="password" id=""
                class="border border-gray-400 rounded-sm w-full p-1.5 mb-3" required>
            <div class="flex justify-between mb-3 text-sm">
                <div class="flex items-center gap-2">
                    <input type="checkbox" class="cursor-pointer" name="" id="">
                    <label for="">Ingat saya</label>
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
