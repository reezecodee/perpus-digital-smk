@extends('layouts.peminjam-layout')
@section('content')
    <section class="container mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <div class="flex">
                <div class="self-start w-full border shadow-md rounded-md p-4">
                    <h1 class="text-lg lg:text-xl font-bold mb-1">Laporkan Masalah
                    </h1>
                    <hr class="mb-3">
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="subject" class="block mb-1 font-semibold text-sm text-gray-900 ">Subject
                                laporan</label>
                            <input type="text" id="subject"
                                class="bg-gray-50 font-semibold border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                placeholder="Masukkan subject laporan" required />
                        </div>
                        <div class="mb-3">
                            <label for="countries" class="block mb-1 text-sm font-semibold text-gray-900 ">Pilih opsi
                                kategori</label>
                            <select id="countries"
                                class="bg-gray-50 font-semibold border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
                                <option selected>Pilih kategori</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="block mb-1 text-sm font-semibold text-gray-900">Keterangan
                                laporan</label>
                            <textarea id="message" rows="4"
                                class="block font-semibold p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-red-500 focus:border-red-500"
                                placeholder="Masukkan keterangan laporan Anda"></textarea>
                        </div>
                        <div class="flex items-center">
                            <input id="default-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 cursor-pointer">
                            <label for="default-checkbox" class="ms-2 text-sm font-medium cursor-pointer text-gray-900">Saya
                                yakin
                                data tersebut sudah benar</label>
                        </div>
                        <div class="flex justify-end">
                            <div class="text-end">
                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                    class="mb-3 bg-red-primary font-semibold p-2 rounded-md text-white hover:bg-red-500 text-sm"
                                    type="button"><i class="fas fa-paper-plane"></i> Laporkan</button>
                            </div>
                        </div>
                        <div id="popup-modal" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full popup-enter-modal">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                        data-modal-hide="popup-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500"><b>Penting!</b> Anda hanya dapat
                                            mengirimkan laporan sebanyak 2x dalam sehari. Apakah Anda ingin melanjutkan?
                                        </h3>
                                        <button data-modal-hide="popup-modal" type="submit"
                                            class="text-white bg-red-primary hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            Ya, tentu
                                        </button>
                                        <button data-modal-hide="popup-modal" type="button"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Batalkan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
