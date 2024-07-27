@extends('layouts.peminjam_layout')
@section('content')
    <section class="mx-auto px-12 text-gray-600">
        <div class="pt-36">
            <div class="border p-4 mb-5">
                <div class="container-envelope w-full">
                    <div class="inner-envelope p-5">
                        <div class="flex justify-between items-center mb-3">
                            <h3 class="text-lg font-bold">Alamat pengiriman</h3>
                            <div class="text-sm font-semibold">
                                <p>Pengiriman: Lorem, ipsum dolor.</p>
                                <p>19839242342</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-10 text-sm font-medium">
                            <div>
                                <p class="mb-1">Nama penerima: Ambatukam</p>
                                <p>081298897305</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim quibusdam veniam eligendi eaque, harum vel suscipit corrupti eveniet rem ducimus.</p>
                            </div>
                            <div>
                                <p class="mb-1">Catatan untuk kurir:</p>
                                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti expedita, excepturi repudiandae vel incidunt voluptate?</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="border p-4 mb-5">
                <h3 class="text-lg font-bold mb-5">Status pengiriman</h3>
                <div class="flex justify-center items-center">
                    <div class="flex flex-col items-center">
                        <div class="bg-red-primary text-white rounded-full h-16 w-16 flex justify-center items-center mb-3">
                            <i class="fas fa-receipt text-lg"></i>
                        </div>
                        <div class="text-sm">Pembayaran sukses</div>
                    </div>
                    <div class="border-4 border-red-primary w-56"></div>
                    <div class="flex flex-col items-center">
                        <div class="bg-red-primary text-white rounded-full h-16 w-16 flex justify-center items-center mb-3">
                            <i class="fas fa-hourglass-start text-lg"></i>
                        </div>
                        <div class="text-sm">Dalam antrian</div>
                    </div>
                    <div class="border-4 border-red-primary w-56"></div>
                    <div class="flex flex-col items-center">
                        <div
                            class="border-4 border-red-primary text-red-primary rounded-full h-16 w-16 flex justify-center items-center mb-3">
                            <i class="fas fa-truck text-lg"></i>
                        </div>
                        <div class="text-sm">Dalam pengiriman</div>
                    </div>
                    <div class="border-4 border-red-primary w-56"></div>
                    <div class="flex flex-col items-center">
                        <div
                            class="border-4 border-red-primary text-red-primary rounded-full h-16 w-16 flex justify-center items-center mb-3">
                            <i class="fas fa-thumbs-up text-lg"></i>
                        </div>
                        <div class="text-sm">Telah diterima</div>
                    </div>
                </div>
            </div>
            <div class="border p-4 mb-5">
                <h3 class="text-lg font-bold mb-5">Detail pembelian</h3>
                <div class="flex gap-5 mb-4">
                    <img src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/medium/MTA-58296597/9_to_12_9_to_12_signature_overlap_semi_blazer_shirt_-_ballet_pink_full02_dl6mail5.jpeg?w=276"
                        alt="" srcset="" width="80" class="rounded-sm">
                    <div>
                        <h1 class="text-lg font-semibold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, nulla.</h1>
                        <p class="text-xs font-medium">x10</p>
                    </div>
                </div>
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <tbody>
                            <tr class="border">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Subtotal produk
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Subtotal pengiriman
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Biaya admin
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Total biaya
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Metode pembayaran
                                </th>
                            </tr>
                            <tr class="border">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Rp.20000
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Rp.20000
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Rp.20000
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Rp.20000
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Rp.20000
                                </th>
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex gap-4 mt-5 justify-end mb-3">
                        <a href="">
                            <button
                                class="border border-red-primary hover:bg-red-500 text-sm font-semibold p-2 text-red-primary duration-300 hover:text-white"><i
                                    class="fas fa-store"></i> Kunjungi toko</button>
                        </a>
                        <a href="">
                            <button
                                class="bg-red-primary hover:bg-red-500 text-sm font-semibold p-2 duration-300 text-white">Beli
                                lagi</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
