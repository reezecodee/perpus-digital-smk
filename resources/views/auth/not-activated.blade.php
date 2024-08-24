@extends('layouts.auth-layout')
@section('content')
    <div>
        <div class="flex justify-center">
            <img src="/img/assets/oh_no.webp" class="w-48" alt="" srcset="">
        </div>

        <div class="text-center">
            <h2 class="text-xl font-bold">Akun kamu berstatus Nonaktif</h2>
            <p class="mb-3">Silahkan hubungi pusat bantuan atau kunjungi perpustakaan untuk informasi tentang akun</p>
            <a href="/">
                <button class="p-3 max-w-sm w-full border-2 border-red-primary text-red-primary font-bold hover:bg-red-500 hover:text-white hover:border-red-500 duration-300">Kembali</button>
            </a>
        </div>
    </div>
@endsection
