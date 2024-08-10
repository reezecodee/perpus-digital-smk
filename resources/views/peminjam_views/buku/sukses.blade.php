@extends('layouts.auth_layout')
@section('content')
    <div class="flex flex-col justify-center items-center h-screen text-center">
        <img src="/img/assets/success.webp"
            alt="" srcset="" width="350">
        <div>
            <h1 class="text-center font-bold text-2xl block mb-3">Peminjaman sukses, terimakasih sudah menggunakan layanan
                kami</h1>
            <a href="{{ route('my_shelf') }}">
                <button
                    class="px-32 py-3 border-2 border-red-primary text-red-primary font-bold hover:bg-red-primary hover:text-white duration-300">Lihat
                    rak buku</button>
            </a>
        </div>
    </div>
@endsection
