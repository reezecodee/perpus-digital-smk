@extends('layouts.peminjam_layout')
@section('content')
    <section class="container mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <div class="flex">
                <div class="self-start w-full border shadow-md rounded-md p-4">
                    <h1 class="text-lg lg:text-xl font-bold mb-1">Notifikasi dari
                        Mas Ambatukam - Atmin
                    </h1>
                    <hr class="mb-3">
                    <div class="border rounded-lg p-2">
                        <div>
                            <h1 class="text-lg font-bold">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex, quam.
                            </h1>
                            <p class="text-xs font-bold">From:
                                Mas Ambatukam - Atmin</p>
                        </div>
                        <hr class="my-4">
                        <p class="text-justify mb-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa tempore
                            nostrum illum possimus. Ullam cumque voluptates quos, quas error dolores aliquid eveniet magnam
                            laudantium nisi dolore quis rerum vero voluptas natus, cupiditate incidunt hic est impedit?
                            Saepe velit adipisci quisquam quibusdam tempora iure magni corporis. Non expedita consequuntur
                            beatae aliquam?</p>
                        <a href="/notifikasi" class="inline-block">
                            <button
                                class="bg-red-primary p-2 text-sm font-semibold rounded-md text-white hover:bg-red-500 text-end">Kembali</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
