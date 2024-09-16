<x-borrower-layout :title="$title">
    <section class="mx-auto px-3 lg:px-20 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <div class="mb-4 flex flex-col items-center md:mb-8 lg:flex-row lg:justify-between">
                <h2 class="mb-2 text-center text-2xl font-bold text-gray-800 lg:mb-0 lg:text-3xl">Rak Buku:
                    {{ $shelf->nama_rak }}
                </h2>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-borrower-layout>
