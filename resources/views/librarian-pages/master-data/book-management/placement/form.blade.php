<x-librarian-layout :title="$title" :heading="$heading">
    <div class="card">
        <div class="card-body">
            @if (isset($placement))
                <form action="{{ route('update_placement', $placement->id) }}" method="post"
                >
                    @method('PUT')
                @else
                    <form action="{{ route('store_placement') }}" method="post">
            @endif
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <x-librarian.input.tom-select label="Pilih rak" name="rak_id" :data="$placement" :collects="$shelves"
                        :isrequired="true" />
                </div>
                <div class="col-md-6">
                    <x-librarian.input.tom-select label="Pilih buku" name="buku_id" :data="$placement" :collects="$books"
                        :isrequired="true" />
                </div>
                <div class="col-md-6">
                    <x-librarian.input.basic label="Jumlah buku" placeholder="Masukkan jumlah buku" name="jumlah_buku" type="number" :value="old('jumlah_buku', $placement->jumlah_buku ?? '')"
                        :isrequired="true" />
                </div>
                <div class="col-md-6">
                    <x-librarian.input.basic label="Jumlah buku saat ini" placeholder="Masukkan jumlah buku saat ini" name="buku_saat_ini" type="number"
                        :value="old('buku_saat_ini', $placement->buku_saat_ini ?? '')" :isrequired="true" />
                </div>
                <div class="col-md-12">
                    <x-librarian.input.cnfrm-checkbox />
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <button class="btn btn-primary" type="submit">Simpan penempatan</button>
            </div>
            </form>
        </div>
    </div>
</x-librarian-layout>
