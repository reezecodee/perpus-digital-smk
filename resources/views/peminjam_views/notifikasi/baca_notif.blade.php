@extends('layouts.peminjam_layout')
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
                        <div>
                            <h1 class="text-lg font-bold">{{ $data->judul }}
                            </h1>
                            <p class="text-xs font-bold">Pengirim: {{ $data->sender->nama }}</p>
                        </div>
                        <hr class="my-4">
                        <p class="text-justify mb-6">{{ $data->pesan }}</p>
                        <a href="{{ route('notification') }}" class="inline-block">
                            <button
                                class="bg-red-primary p-2 text-sm font-semibold rounded-md text-white hover:bg-red-500 text-end">Kembali</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
