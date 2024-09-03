<x-librarian-layout :title="$title" :heading="$heading">
    <div class="alert alert-primary" role="alert">
        Gunakan fitur ini hanya dalam keadaan penting saja. Email yang Anda kirim tidak dapat dikembalikan, jadi
        berhati-hatilah.
    </div>
    <div class="card">
        <div class="card-body">
            <form id="notif-form" action="{{ route('send_email') }}" method="post">
                @csrf
                <div class="d-flex justify-content-end align-items-center">
                    <x-librarian.input.tom-select-notif name="penerima_id" placeholder="Pilih akun pengguna"
                        :options="$receivers" />
                </div>
                <div class="form-group">
                    <label for="">Subject</label>
                    <input type="text" autocomplete="off" name="subject" class="form-control" placeholder="Subject:">
                </div>
                <x-librarian.input.froala name="pesan" />
                <button type="button" onclick="confirmSendNotif()" class="btn btn-primary mt-4">Kirim email</button>
            </form>
        </div>
    </div>
</x-librarian-layout>
