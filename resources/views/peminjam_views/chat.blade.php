@extends('layouts.peminjam_layout')
@section('content')
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <div class="border rounded-md p-3 lg:p-6 shadow-sm mb-7">
                <h1 class="text-2xl mb-4 font-bold block">Chat Pustakawan</h1>
                <div class="flex gap-2 lg:gap-5 h-72">
                    <div class="overflow-y-scroll p-1 lg:p-3 border rounded-md max-w-xs w-full">
                        <a href="">
                            <button class="border rounded-md p-3 mr-5 mb-3 block w-full">
                                <div class="flex items-center gap-3">
                                    <img src="https://lh3.googleusercontent.com/ogw/AF2bZygNbPseDkQ0HS9b3esmBQqCXS-H_eenMu566cNexqZF128=s64-c-mo"
                                        alt="" srcset="" class="rounded-full w-8">
                                    <div>
                                        <h2 class="font-bold text-xs lg:text-base block text-start truncate">
                                            Ambatukam</h2>
                                        <p class="text-xs text-start font-medium">Pustakawan</p>
                                    </div>
                                </div>
                            </button>
                        </a>
                    </div>
                    <div class="overflow-y-scroll p-3 border rounded-md w-full pt-7">
                        <div class="flex flex-col justify-center items-center">
                            <img src="https://img.freepik.com/free-vector/messages-concept-illustration_114360-583.jpg?t=st=1719328038~exp=1719331638~hmac=bad6c1947de83c03f5fb58fb6d85ee68b52e7bd84af35c6dc2cf10605b2b2d54&w=740"
                                width="220" alt="" srcset="">
                            <p class="font-semibold">Selamat datang di fitur chat kami</p>
                        </div>
                    </div>
                </div>
                <div class="flex mt-7">
                    <form class="w-full" method="post">
                        <div class="relative">
                            <input type="text" name="pesan" autocomplete="off"
                                class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50"
                                placeholder="Tulis pesan Anda disini..." required />
                            <button type="submit"
                                class="text-white absolute end-2.5 bottom-1 bg-red-primary hover:bg-red-800 focus:ring-4 focus:outline-none font-medium rounded-full text-sm w-11 py-3"><i
                                    class="fas fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
