<x-student-layout :title="$title">
    <section class="container mx-auto px-3 lg:px-0 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <h1 class="text-2xl font-bold mb-10">Hasil pencarian: {{ request()->query('q') }}</h1>
            <div class="flex lg:block justify-center lg:justify-normal">
                <div class="grid grid-cols-2 lg:grid-cols-6 gap-9 lg:gap-3">
                    @foreach ($books as $item)
                        <x-borrower.card.book :item="$item" />
                    @endforeach
                </div>
                @if ($books->isEmpty())
                    <div class="text-center w-full">
                        <div class="flex justify-center">
                            <img src="/img/assets/search_result_not_found.webp" alt="" srcset="" width="300"
                                class="block">
                        </div>
                        <h1 class="text-black text-center text-lg font-semibold">Tidak dapat menemukan pencarian
                            "{{ request()->query('q') }}"</h1>
                    </div>
                @endif
            </div>
        </div>
    </section>
</x-student-layout>
