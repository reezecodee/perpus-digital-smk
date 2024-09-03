<x-librarian-layout :title="$title" :heading="$heading">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <x-librarian.input.basic-disable label="Nama penerima" name="nama" :value="$data->receiver->nama" />
                </div>
                <div class="col-md-6">
                    <x-librarian.input.basic-disable label="Tanggal pengiriman" name="tanggal" :value="$data->created_at" />
                </div>
                <div class="col-md-12">
                    <x-librarian.input.basic-disable label="Judul notifikasi" name="judul" :value="$data->judul" />
                </div>
            </div>
            <hr class="border-dark">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2">
                            <b>Pesan notifikasi:</b>
                        </div>
                        <div class="col-md-10 text-justify">
                            {!! $data->pesan !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-librarian-layout>