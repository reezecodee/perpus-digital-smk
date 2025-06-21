<x-student-layout :title="$title">
    <section class="container mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <div class="flex">
                <div class="self-start w-full border shadow-md rounded-md p-4">
                    <h1 class="text-xl font-bold mb-1">Notifikasi</h1>
                    <hr class="mb-3">
                    @forelse ($notifications as $item)
                        <x-borrower.card.notification :item="$item" />
                    @empty
                        <div class="flex justify-center">
                            <img src="/img/assets/notification.webp" alt="" srcset="" width="300"
                                class="block">
                        </div>
                        <h1 class="text-black text-center text-lg font-semibold">Belum ada notifikasi yang masuk</h1>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</x-student-layout>
