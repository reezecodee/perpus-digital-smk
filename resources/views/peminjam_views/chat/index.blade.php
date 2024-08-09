@extends('layouts.peminjam_layout')
@section('content')
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <div class="border rounded-md p-3 lg:p-6 shadow-sm mb-7">
                <h1 class="text-2xl mb-4 font-bold block">Chat Pustakawan</h1>
                <div id="alert-1"
                    class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                        Kamu bisa hubungi pustakawan melalui Whatsapp mereka jika mereka terlalu slow response di forum chat ini.
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-1" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <div class="flex gap-2 lg:gap-5 h-72">
                    <div class="overflow-y-scroll p-1 lg:p-3 border rounded-md max-w-xs w-full">
                        @foreach ($librarians as $item)
                            <a href="{{ route('chat', $item->id) }}">
                                <button class="border rounded-md p-3 mr-5 mb-3 block w-full"
                                    id="contactDropdown{{ $loop->iteration }}"
                                    data-dropdown-toggle="dropdownContactDelay{{ $loop->iteration }}"
                                    data-dropdown-delay="500" data-dropdown-trigger="hover">
                                    <div class="flex items-center gap-3">
                                        <img src="https://lh3.googleusercontent.com/ogw/AF2bZygNbPseDkQ0HS9b3esmBQqCXS-H_eenMu566cNexqZF128=s64-c-mo"
                                            alt="" srcset="" class="rounded-full w-8">
                                        <div>
                                            <h2 class="font-bold text-xs lg:text-base block text-start truncate">
                                                {{ $item->nama }}</h2>
                                            <p class="text-xs text-start font-medium">Pustakawan</p>
                                        </div>
                                    </div>
                                </button>
                            </a>
                            <div id="dropdownContactDelay{{ $loop->iteration }}"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700"
                                    aria-labelledby="contactDropdown{{ $loop->iteration }}">
                                    <li>
                                        <a href="https://wa.me/{{ preg_replace('/^0/', '62', $item->telepon) }}?text=Yth. %20Bapak/Ibu%20Pustakawan%20saya%20ingin%20bertanya"
                                            class="block px-4 py-2 hover:bg-gray-100
                                            target="_blank"><i
                                                class="fa-brands fa-whatsapp"></i> Hubungi Whatsapp</a>
                                    </li>
                                </ul>
                            </div>
                        @endforeach
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
