<x-borrower-layout :title="$title">
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <aside aria-label="Artikel terbaru">
                <div class="mx-auto max-w-screen-xl">
                    <h2 class="mb-8 text-2xl font-bold text-gray-900">Artikel Terbaru</h2>
                    <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
                        @foreach ($articles as $item)
                            <article class="max-w-xs">
                                <a href="{{ route('show.readArticle', $item->id) }}">
                                    <img src="{{ asset('storage/img/thumbnail/' . ($item->thumbnail ?? 'unknown_thumbnail.png')) }}"
                                        class="mb-5 rounded-lg" alt="Image 1" loading="lazy">
                                </a>
                                <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900">
                                    <a href="#">{{ $item->judul }}</a>
                                </h2>
                                <p class="mb-4 text-gray-500">{{ $item->deskripsi }}</p>
                            </article>
                        @endforeach
                    </div>
                    @if ($articles->isEmpty())
                        <div class="flex justify-center">
                            <div class="text-center">
                                <img src="/img/assets/oh_no.webp" alt="" srcset=""
                                    class="w-52 inline-block">
                                <h1 class="text-black text-center text-lg font-semibold">Belum ada artikel yang dibuat.</h1>
                            </div>
                        </div>
                    @endif
                </div>
            </aside>
        </div>
    </section>
</x-borrower-layout>
