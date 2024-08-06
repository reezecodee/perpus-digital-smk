@extends('layouts.peminjam_layout')
@section('content')
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <div class="flex flex-col lg:flex-row gap-3">
                @include('partials.peminjam.sidebar')
                <div class="self-start w-full border shadow-md rounded-md p-4">
                    <h1 class="text-xl font-bold mb-1">History peminjaman buku</h1>
                    <hr class="mb-3">
                    <div class="mb-5">
                        <div class="flex gap-5 font-bold">
                            <p id="slide1"
                                class="cursor-pointer text-red-primary border-b-2 border-red-primary pb-1 hover:text-red-primary">
                                Riwayat</p>
                            <p id="slide2" class="cursor-pointer hover:text-red-primary">Denda</p>
                        </div>
                    </div>
                    <div id="slide-display1" class="block">
                        <div class="flex justify-between items-center border p-3 rounded-md mb-3">
                            <div>
                                <a href="">
                                    <h4 class="text-base lg:text-lg font-bold leading-5 lg:leading-none">Laut bercerita</h4>
                                </a>
                                <p class="text-xs">Status: Sudah dikembalikan</p>
                            </div>
                            <div class="py-1 px-3 rounded-lg lg:text-sm font-semibold text-white bg-red-primary text-xs">
                                20 Juni 2024
                            </div>
                        </div>
                    </div>
                    <div id="slide-display2" class="hidden">
                        <div class="flex justify-between items-center border p-3 rounded-md mb-3">
                            <div>
                                <a href="">
                                    <h4 class="text-base lg:text-lg font-bold leading-5 lg:leading-none">Laut bercerita</h4>
                                </a>
                                <p class="text-xs">Status: Sudah dimakan</p>
                            </div>
                            <div class="py-1 px-3 rounded-lg lg:text-sm font-semibold text-white bg-red-primary text-xs">
                                20 Juni 2024
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="/js/riwayat.js"></script>
@endsection
