<x-borrower-layout :title="$title">
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <div class="flex flex-col lg:flex-row gap-3">
                <x-borrower.navigation.sidebar />
                {{ $content }}
            </div>
        </div>
    </section>
</x-borrower-layout>
