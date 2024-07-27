@extends('layouts.peminjam_layout')
@section('content')
    <section class="mx-auto px-12 text-gray-600">
        <div class="pt-36">
            <div class="border p-4 mb-5">
                <h3 class="text-lg font-bold mb-5">Status peminjaman</h3>
                <div class="flex justify-around items-center">
                    <div class="flex flex-col items-center">
                        <div class="bg-red-primary text-white rounded-full h-16 w-16 flex justify-center items-center mb-3">
                            <i class="fas fa-hourglass-start text-lg"></i>
                        </div>
                        <div class="text-sm">Masa pinjam</div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div
                            class="border-4 border-red-primary text-red-primary rounded-full h-16 w-16 flex justify-center items-center mb-3">
                            <i class="fas fa-receipt text-lg"></i>
                        </div>
                        <div class="text-sm">Masa pengembalian</div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div
                            class="border-4 border-red-primary text-red-primary rounded-full h-16 w-16 flex justify-center items-center mb-3">
                            <i class="fas fa-thumbs-up text-lg"></i>
                        </div>
                        <div class="text-sm">Telah dikembalikan</div>
                    </div>
                </div>
                <div class="p-4 mt-5 text-sm text-blue-800 rounded-lg bg-blue-50" role="alert">
                    Saat ini status peminjaman masih dalam masa peminjaman, silahkan nikmati membaca bukumu.
                </div>
            </div>
            <div class="border p-4 mb-5">
                <h3 class="text-lg font-bold mb-5">Detail buku</h3>
                <div class="flex gap-5 mb-4">
                    <img src="https://ebooks.gramedia.com/ebook-covers/90158/thumb_image_normal/BLK_RDMSTHOMS1706838863836.jpg"
                        alt="" srcset="" width="200" class="rounded-md">
                    <div>
                        <h1 class="text-xl font-bold mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Fugit,
                            nulla.</h1>
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <tr class="border">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Pengarang
                                </th>
                                <td class="px-6 py-4 whitespace-nowrap">Lorem ipsum dolor sit amet</td>
                            </tr>
                            <tr class="border">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Penerbit
                                </th>
                                <td class="px-6 py-4 whitespace-nowrap">Lorem ipsum dolor sit amet</td>
                            </tr>
                            <tr class="border">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    ISBN
                                </th>
                                <td class="px-6 py-4 whitespace-nowrap">93294828934234</td>
                            </tr>
                            <tr class="border">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Jumlah halaman
                                </th>
                                <td class="px-6 py-4 whitespace-nowrap">200</td>
                            </tr>
                            <tr class="border">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Barcode
                                </th>
                                <td class="px-6 py-4 whitespace-nowrap">192831232</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="bg-gray-100">
                            <tr class="border">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Pustakawan pemberi
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Kode buku perpustakaan
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Tanggal peminjaman
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Tanggal pengembalian
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Prof. Ambatukam S.Jmk
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    9827348232
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    20 Juli 2024
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    20 Agustus 2024
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
