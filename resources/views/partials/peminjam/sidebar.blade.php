<div class="self-start max-w-sm w-full border shadow-md rounded-md p-4">
    <a href="{{ route('peminjam.overview') }}"
        class="{{ Request::is('overview-profile*') ? 'bg-red-primary hover:bg-red-500 text-white' : 'hover:bg-red-500 hover:text-white' }} block mb-2 p-2 rounded-md w-full cursor-pointer font-semibold">
        Profile saya
    </a>
    <a href="{{ route('peminjam.history') }}"
        class="{{ Request::is('riwayat-peminjaman*') ? 'bg-red-primary hover:bg-red-500 text-white' : 'hover:bg-red-500 hover:text-white' }} block mb-2 p-2 rounded-md w-full cursor-pointer font-semibold">
        Riwayat peminjaman
    </a>
    <a href="{{ route('peminjam.ch_password') }}"
        class="{{ Request::is('ganti-password*') ? 'bg-red-primary hover:bg-red-500 text-white' : 'hover:bg-red-500 hover:text-white' }} block mb-2 p-2 rounded-md w-full cursor-pointer font-semibold">
        Ganti password
    </a>
</div>
