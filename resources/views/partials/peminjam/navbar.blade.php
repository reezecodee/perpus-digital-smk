<header class="xl:container xl:mx-auto">
    <nav class="bg-red-primary w-full text-white fixed z-50 shadow-lg xl:container xl:mx-auto">
        <div class="flex justify-between items-center py-3 px-2 lg:px-7">
            <div class="flex gap-5 items-center">
                <a href="{{ route('peminjam.dashboard') }}" class="hidden lg:inline">
                    <img src="/assets/logo.svg" width="145" alt="" srcset="">
                </a>
                <form action="" method="get" class="relative">
                    @csrf
                    <input type="text" name="q" value=""
                        class="bg-white py-2.5 px-3 rounded-md w-[17rem] lg:w-[24rem] text-sm placeholder:text-black text-black font-semibold outline-none border-none"
                        placeholder="Cari buku yang kamu sukai..." autocomplete="off">
                    <div class="absolute right-0 top-0" style="margin-top: 4px; margin-right: 8px;">
                        <button type="submit" class="bg-red-primary hover:bg-red-500 rounded-full p-1 w-8 text-center">
                            <i class="fas fa-search text-white text-sm"></i>
                        </button>
                    </div>
                </form>
                <a href="{{ route('peminjam.notif') }}" class="hidden lg:inline">
                    <div
                        class="bg-red-primary rounded-full p-1 w-9 text-center border-2 border-white hover:border-red-primary duration-500 cursor-pointer">
                        <i class="fas fa-bell text-white text-sm"></i>
                    </div>
                </a>
                <a href="{{ route('peminjam.liked') }}" class="hidden lg:inline">
                    <div
                        class="bg-red-primary rounded-full p-1 w-9 text-center border-2 border-white hover:border-red-primary duration-500 cursor-pointer">
                        <i class="fa-solid fa-heart text-white text-sm"></i>
                    </div>
                </a>
                <a href="{{ route('peminjam.shelf') }}" class="hidden lg:inline">
                    <div
                        class="bg-red-primary rounded-full p-1 w-9 text-center border-2 border-white hover:border-red-primary duration-500 cursor-pointer">
                        <i class="fa-solid fa-book-bookmark text-white text-sm"></i>
                    </div>
                </a>
            </div>
            @auth
                <div class="flex items-center gap-3 cursor-pointer group" id="dropdownDelayButton"
                    data-dropdown-toggle="dropdownDelay" data-dropdown-delay="100" data-dropdown-trigger="hover">
                    <span class="font-semibold group-hover:text-red-200 duration-200">{{ auth()->user()->username }}</span>
                    <img src="/img/unknown_profile.jpg"
                        class="rounded-full p-0.5 border-2 border-white" width="45" alt="" srcset="">
                </div>
                <div id="dropdownDelay"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 font-semibold">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDelayButton">
                        <li>
                            <a href="{{ route('peminjam.dashboard') }}" class="block px-4 py-2 hover:bg-gray-100"><i class="fas fa-home"></i>
                                Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('peminjam.overview') }}" class="block px-4 py-2 hover:bg-gray-100"><i class="fas fa-user"></i>
                                Profile</a>
                        </li>
                        <hr class="border">
                        <li>
                            <a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-gray-100"><i class="fas fa-sign-out-alt"></i>
                                Logout</a>
                        </li>
                    </ul>
                </div>
            @endauth
            @guest
                <div class="flex items-center gap-2">
                    <a href="{{ route('show_login') }}">
                        <button
                            class="bg-white border-2 border-white hover:bg-transparent hover:text-white duration-300 rounded-lg py-1.5 px-4 text-red-primary text-sm font-bold"><i
                                class="fas fa-sign-in-alt"></i> Login</button>
                    </a>
                    <a href="/register" class="hidden lg:inline">
                        <button
                            class="border-2 border-white hover:bg-white hover:text-red-primary duration-300 text-white rounded-lg py-1.5 px-4 text-sm font-bold">Register</button>
                    </a>
                </div>
            @endguest
        </div>
        <div class="lg:flex justify-between items-center text-black font-semibold text-sm hidden">
            <div class="bg-white p-2 rounded-tr-md">
                {{-- <php if (isset($_SESSION['user_id']) && $dataUser['role'] !== 'Admin') : ?> --}}
                {{-- <a href="/atur_alamat">
                        <i class="fas fa-map-marker-alt text-red-primary"></i> --}}
                {{-- <= isset($dataUser['nama_penerima']) ? "Penerima: " . ($dataUser['nama_penerima']) : 'Atur alamat pengiriman' ?> --}}
                {{-- </a> --}}
                {{-- <php else : ?> --}}
                <div>
                    Selamat Datang
                </div>
                {{-- <php endif; ?> --}}
            </div>
            <div class="lg:flex gap-7 text-white hidden">
                <a href="/hasil-pencarian?q=novel" class="hover:text-red-200 duration-150">Novel</a>|
                <a href="/hasil-pencarian?q=komik" class="hover:text-red-200 duration-150">Komik</a>|
                <a href="/hasil-pencarian?q=tutorial" class="hover:text-red-200 duration-150">Tutorial</a>|
                <a href="/hasil-pencarian?q=sejarah" class="hover:text-red-200 duration-150">Sejarah</a>|
                <a href="/hasil-pencarian?q=matematika" class="hover:text-red-200 duration-150">Matematika</a>|
                <a href="/hasil-pencarian?q=buku+bahasa" class="hover:text-red-200 duration-150">Buku bahasa</a>|
                <a href="/hasil-pencarian?q=teknologi" class="hover:text-red-200 duration-150">Teknologi</a>
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
