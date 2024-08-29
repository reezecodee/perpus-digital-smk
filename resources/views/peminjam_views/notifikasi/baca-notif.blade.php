@extends('layouts.peminjam-layout')
@section('content')
    <section class="container mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <div class="flex">
                <div class="self-start w-full border shadow-md rounded-md p-4">
                    <h1 class="text-lg lg:text-xl font-bold mb-1">Notifikasi dari
                        {{ $data->sender->nama }}
                    </h1>
                    <hr class="mb-3">
                    <div class="border rounded-lg p-2">
                        <div class="flex items-center gap-3">
                            <img src="https://www.svgrepo.com/show/503852/mail.svg" alt="" srcset=""
                                class="w-16">
                            <div>
                                <h1 class="text-lg font-bold">{{ $data->judul }}
                                </h1>
                                <p class="text-xs font-bold">Pengirim: {{ $data->sender->nama }}</p>
                            </div>
                        </div>
                        <hr class="mt-3 mb-4">
                        <p class="text-justify">{!! $data->pesan !!}</p>
                        <a href="{{ route('notification') }}" class="block mt-6">
                            <x-peminjam.button.normal-btn><i class="fas fa-chevron-circle-left"></i>
                                Kembali</x-peminjam.button.normal-btn>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
