<x-librarian-layout :title="$title" :heading="$heading">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <x-librarian.input.basic-disable label="Nama pelapor" name="nama_pelapor" :value="$data->user->nama" />
                </div>
                <div class="col-md-6">
                    <x-librarian.input.basic-disable label="Email pelapor" name="email_pelapor" :value="$data->user->email" />
                </div>
                <div class="col-md-6">
                    <x-librarian.input.basic-disable label="Kategori laporan" name="kategori" :value="$data->kategori" />
                </div>
                <div class="col-md-6">
                    <x-librarian.input.basic-disable label="Subject" name="subject" :value="$data->subject" />
                </div>
                <div class="col-md-12">
                    <x-librarian.input.textarea-disable label="Laporan" name="laporan" :value="$data->laporan" />
                </div>
            </div>
            <a href="{{ route('buat_notifikasi') }}">
                <button class="btn btn-primary"><i class="fas fa-bell"></i> Tanggapi via notifikasi</button>
            </a>
            <a href="{{ route('kirim_email') }}">
                <button class="btn btn-primary"><i class="fas fa-envelope"></i> Tanggapi via email</button>
            </a>
        </div>
    </div>
</x-librarian-layout>
