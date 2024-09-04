<x-borrower-layout :title="$title" :bubble="false">
    <div class="flex flex-col justify-center items-center h-screen text-center">
        <img src="/img/assets/success.webp" alt="" srcset="" width="250">
        <div>
            <h1 class="text-center font-bold text-xl block mb-3">{{ session('success') }}</h1>
            <a href="{{ route('my_shelf') }}">
                <button
                    class="px-28 py-2.5 border-2 border-red-primary text-red-primary font-bold hover:bg-red-primary hover:text-white duration-300">Lihat
                    rak buku</button>
            </a>
        </div>
    </div>
</x-borrower-layout>
