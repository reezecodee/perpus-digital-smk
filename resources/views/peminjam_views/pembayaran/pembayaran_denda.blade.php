@extends('layouts.peminjam_layout')
@section('content')
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <div class="border p-7 shadow-md rounded-md mb-5">
                <div class="flex justify-between items-center">
                    <div class="font-semibold">
                        <p><span class="text-red-primary">Judul buku:</span> {{ $data->book->judul }}</p>
                        <p><span class="text-red-primary">Status:</span> {{ $data->status }}</p>
                        <p><span class="text-red-primary">Keterangan:</span> -</p>
                    </div>
                    <a href="">
                        <button
                            class="p-2 rounded-lg text-sm font-bold bg-red-primary text-white hover:bg-red-500 duration-300">Tata
                            cara pembayaran</button>
                    </a>
                </div>
                <hr class="border-t-2 border-red-primary my-5">
                <div class="flex justify-center gap-3">
                    <div class="flex gap-5">
                        <img src="https://assets.kompasiana.com/items/album/2020/06/05/qris-baznas-5eda34a3d541df43ac060963.png?t=o&v=300"
                            class="w-72 border-2 rounded-md" alt="" srcset="">
                        <div class="mb-3">
                            <h3 class="text-2xl font-semibold mb-1">Bayar Via Qris</h3>
                            <p class="font-medium test-sm mb-5"><span class="font-extrabold">Penting!</span> harap bayarkan
                                denda
                                sesuai nominal yang tertera. Pembayaran tidak akan dianggap jika kamu membayar kurang atau
                                lebih dari nominal denda.</p>
                            <div class="flex items-center gap-3 mb-5">
                                <h3 class="text-2xl font-bold mb-1">Rp.200.000</h3>
                                <button
                                    class="p-2 border-2 border-red-primary text-red-primary rounded-lg text-sm font-bold hover:bg-red-primary hover:text-white duration-300">Salin
                                    nominal</button>
                            </div>
                            <div>
                                <button
                                    class="p-2 rounded-lg text-sm font-bold bg-red-primary text-white hover:bg-red-500 duration-300"><i
                                        class="fas fa-download"></i> Download Qris</button>
                                <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                    class="p-2 rounded-lg text-sm font-bold border border-red-primary text-red-primary hover:bg-red-primary hover:text-white duration-300"><i
                                        class="fas fa-search-plus"></i> Zoom</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="default-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Bayar Via Qris
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="default-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4 flex justify-center">
                                <img src="https://assets.kompasiana.com/items/album/2020/06/05/qris-baznas-5eda34a3d541df43ac060963.png?t=o&v=300"
                                class="w-72 border-2 rounded-md" alt="" srcset="">
                            </div>
                            <!-- Modal footer -->
                            <div
                                class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="default-modal" type="button"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium focus:outline-none bg-red-primary rounded-lg border border-gray-200 hover:bg-red-500 text-white focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border p-7 shadow-md rounded-md mb-5">
                <h3 class="text-xl font-semibold mb-4">Upload bukti pembayaran</h3>
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="flex justify-center mb-5">
                        <img src="https://mediakonsumen.com/files/2023/04/IMG-20230403-WA0025.jpg" width="400"
                            id="preview" alt="" srcset="">
                    </div>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 mb-5"
                        id="file_input" type="file">
                    <div class="text-end">
                        <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                            class="p-3 rounded-lg text-sm font-bold bg-red-primary text-white hover:bg-red-500 duration-300">Kirim
                            bukti</button>
                    </div>
                    <div id="popup-modal" tabindex="-1"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="popup-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-4 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah kamu yakin
                                        gambar bukti sudah benar?</h3>
                                    <button data-modal-hide="popup-modal" type="button"
                                        class="text-white bg-red-primary hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Ya, sudah benar
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
    </section>
@endsection
