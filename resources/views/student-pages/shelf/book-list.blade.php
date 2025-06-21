<x-student-layout :title="$title">
    <section class="mx-auto px-3 lg:px-20 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <div class="mb-4 flex flex-col items-center md:mb-8 lg:flex-row lg:justify-between">
                <h2 class="mb-2 text-center text-2xl font-bold text-gray-800 lg:mb-0 lg:text-3xl">Rak Buku:
                    {{ $shelf->nama_rak }}
                </h2>
                <a href="{{ route('show.allShelves') }}">
                    <x-borrower.button.normal-btn>
                        <i class="fas fa-chevron-circle-left"></i> Kembali ke rak
                    </x-borrower.button.normal-btn>
                </a>
            </div>
            <div class="flex justify-center">
                <div>
                    <div class="text-center p-0 mb-10">
                        @foreach ($placements->chunk(7) as $chunk)
                            <div class="w-full h-auto relative text-center" style="margin-bottom: -20px">
                                @foreach ($chunk as $item)
                                    <a href="{{ route('show.bookDetail', $item->book->id) }}"
                                        class="inline-block cursor-pointer m-0 mx-[0.5%] w-[15%] max-w-[115px] shadow-md">
                                        <img src="{{ asset('storage/img/cover/' . ($item->book->cover_buku ?? 'unknown_cover.png')) }}"
                                            class="w-full block align-top hvr-float" loading="lazy">
                                    </a>
                                @endforeach
                            </div>
                            <img class="z-0 h-auto max-w-5xl w-full align-top mt-[-30px]" src="/img/rack/rack-c.jpg">
                        @endforeach
                        @if ($placements->isEmpty())
                            <div class="flex justify-center">
                                <div class="text-center">
                                    <img src="/img/assets/oh_no.webp" alt="" srcset=""
                                        class="w-52 inline-block">
                                    <h1 class="text-black text-center text-lg font-semibold">Rak ini belum terisi buku, petugas akan segera mengisinya.</h1>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-student-layout>
