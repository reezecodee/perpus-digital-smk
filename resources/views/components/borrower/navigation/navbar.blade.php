<header class="xl:container xl:mx-auto">
    <nav class="bg-red-primary w-full text-white fixed z-40 shadow-lg xl:container xl:mx-auto">
        <div class="flex justify-between items-center py-3 px-2 lg:px-7">
            <div class="flex gap-5 items-center">
                <a href="@auth {{ route('show.homepage') }} @else / @endauth" class="hidden lg:inline">
                    <img src="/assets/logo-perpus.png" width="180" alt="" srcset="">
                </a>
                <form action="{{ route('show.searchResult') }}" method="get" class="relative">
                    @csrf
                    <input type="text" name="q" value="{{ request()->query('q') }}"
                        class="bg-white py-2.5 px-3 rounded-md w-[17rem] lg:w-[24rem] text-sm placeholder:text-black text-black font-semibold focus:ring-red-500 focus:border-red-500"
                        placeholder="Cari buku yang kamu sukai..." autocomplete="off">
                    <div class="absolute right-0 top-0" style="margin-top: 4px; margin-right: 8px;">
                        <button type="submit"
                            class="bg-red-primary hover:bg-red-500 rounded-full p-1 w-8 text-center hvr-shrink">
                            <i class="fas fa-search text-white text-sm"></i>
                        </button>
                    </div>
                </form>
                <a href="{{ route('show.notification') }}" class="hidden lg:inline" title="Notifikasi">
                    <div
                        class="bg-red-primary rounded-full p-1 w-9 text-center border-2 border-white hover:border-red-primary duration-500 cursor-pointer">
                        <i class="fas fa-bell text-white text-sm hvr-grow"></i>
                    </div>
                </a>
                <a href="{{ route('show.bookliked') }}" class="hidden lg:inline" title="Buku disukai">
                    <div
                        class="bg-red-primary rounded-full p-1 w-9 text-center border-2 border-white hover:border-red-primary duration-500 cursor-pointer">
                        <i class="fa-solid fa-heart text-white text-sm hvr-grow"></i>
                    </div>
                </a>
                <a href="{{ route('show.myBookShelf') }}" class="hidden lg:inline" title="Rak buku saya">
                    <div
                        class="bg-red-primary rounded-full p-1 w-9 text-center border-2 border-white hover:border-red-primary duration-500 cursor-pointer">
                        <i class="fa-solid fa-book-bookmark text-white text-sm hvr-grow"></i>
                    </div>
                </a>
                <a href="{{ route('show.visit') }}" class="hidden lg:inline" title="Kunjungan perpustakaan">
                    <div
                        class="bg-red-primary rounded-full p-1 w-9 text-center border-2 border-white hover:border-red-primary duration-500 cursor-pointer">
                        <i class="fa-solid fa-clipboard-list text-white text-sm hvr-grow"></i>
                    </div>
                </a>
            </div>
            @auth
            <div class="flex items-center gap-3 cursor-pointer group" id="dropdownDelayButton"
                data-dropdown-toggle="dropdownDelay" data-dropdown-delay="100" data-dropdown-trigger="hover">
                <span class="font-semibold group-hover:text-red-200 duration-200">{{ auth()->user()->username }}</span>
                <img src="{{ asset('storage/img/profile/' . (auth()->user()->photo ?? 'unknown.jpg')) }}"
                    class="rounded-full p-0.5 border-2 border-white hvr-grow" width="45" alt="" srcset="">
            </div>
            <div id="dropdownDelay"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 font-semibold">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDelayButton">
                    <li>
                        <a href="{{ route('show.homepage') }}" class="flex items-center px-4 py-2 hover:bg-gray-100">
                            <i class="fas fa-home mr-2"></i>
                            <span class="flex-grow">Homepage</span> <!-- Memastikan teks mengambil sisa ruang -->
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('show.calendar') }}" class="flex items-center px-4 py-2 hover:bg-gray-100">
                            <i class="fas fa-calendar mr-2"></i>
                            <span class="flex-grow">Kalender</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('show.paymentHistories') }}"
                            class="flex items-center px-4 py-2 hover:bg-gray-100">
                            <i class="fas fa-history mr-2"></i>
                            <span class="flex-grow">Riwayat</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('show.overview') }}" class="flex items-center px-4 py-2 hover:bg-gray-100">
                            <i class="fas fa-user mr-2"></i>
                            <span class="flex-grow">Profile</span>
                        </a>
                    </li>
                    <hr class="border">
                    <li>
                        <form action="{{ route('logout') }}" method="post" class="w-full">
                            @csrf
                            <button type="submit" class="flex items-center px-4 py-2 hover:bg-gray-100  w-full">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                <span class="flex-grow">Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>

            </div>
            @endauth
            @guest
            <div class="flex items-center gap-2">
                <a href="{{ route('show.login') }}">
                    <button
                        class="bg-white border-2 border-white hover:bg-transparent hover:text-white duration-300 rounded-lg py-1.5 px-4 text-red-primary text-sm font-bold"><i
                            class="fas fa-sign-in-alt"></i> Login</button>
                </a>
            </div>
            @endguest
        </div>
        <div class="lg:flex justify-between items-center text-black font-semibold text-sm hidden">
            <div class="bg-white p-2 rounded-tr-md">
                <div>
                    Selamat Datang
                </div>
            </div>
            <div class="lg:flex gap-7 text-white hidden">
                @foreach ($top_categories as $item)
                <a href="{{ route('show.searchResult') }}?q={{ $item->nama_kategori }}"
                    class="hover:text-red-200 duration-150 hvr-shrink">{{ $item->nama_kategori }}</a>
                @if (!$loop->last)
                |
                @endif
                @endforeach
            </div>
            <div class="bg-white p-2 rounded-tl-md">
                <div class="flex items-center gap-3 cursor-pointer">
                    <span>Bahasa Indonesia</span>
                    <img src="/assets/id.svg" width="20" class="border rounded-full" alt="" srcset="">
                </div>
            </div>
        </div>
    </nav>
</header>