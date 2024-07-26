@extends('layouts.peminjam_layout')
@section('content')
    <section>
        <div class="pt-20 mx-auto">
            <div class="flex justify-center py-7 mb-1">
                <div class="w-full bg-gray-secondary py-2">
                    <div class="swiper" style="width: 1200px;">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="/assets/carousel-1.jpg" alt="" srcset="" class="w-full rounded-lg">
                            </div>
                            <div class="swiper-slide">
                                <img src="/assets/carousel-2.jpg" alt="" srcset="" class="w-full rounded-lg">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-scrollbar"></div>
                    </div>
                </div>
            </div>
            <div class="px-8 mx-auto">
                <h1 class="text-2xl mb-4 font-bold">Rekomendasi untuk mu</h1>
                <div class="grid grid-cols-7 gap-3">
                    <div class="w-40">
                        <a href="">
                            <img src="https://preyash2047.github.io/assets/img/no-preview-available.png?h=824917b166935ea4772542bec6e8f636"
                                alt="" srcset="" class="rounded-lg mb-2">
                            <p class="text-sm font-semibold">Jujutsu Kaisen: Shibuya Incident</p>
                            {{-- <p class="text-lg font-bold text-red-primary">Rp</p> --}}
                            <p class="text-xs font-medium">Kategori: Komik
                            </p>
                            <p class="text-xs font-medium"><i class="fas fa-star text-yellow-500"></i>
                                5 | Tersedia 10
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
