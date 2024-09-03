<x-librarian-layout :title="$title" :heading="$heading">
    <div class="card">
        <div class="card-body">
            @if (isset($visit))
                <form action="{{ route('update_visit', $visit->id) }}" method="post">
                    @method('PUT')
                @else
                    <form action="{{ route('store_visit') }}" method="post">
            @endif
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <x-librarian.input.tom-select label="Pengunjung" name="pengunjung_id" :data="$visit" :collects="$visitors"
                        :isrequired="true" />
                </div>
                <div class="col-md-4">
                    <x-librarian.input.basic label="Tanggal kunjungan" name="tanggal_kunjungan" :value="old('tanggal_kunjungan', $visit->tanggal_kunjungan ?? date('Y-m-d'))"
                        placeholder="" type="date" :isrequired="true" />
                </div>
                <div class="col-md-4">
                    <x-librarian.input.visit-status :visit="$visit" />
                </div>
                <div class="col-md-12">
                    <x-librarian.input.textarea label="Keterangan kunjungan" name="keterangan_kunjungan" :value="old('keterangan_kunjungan', $visit->keterangan_kunjungan ?? '')"
                        placeholder="Masukkan keterangan kunjungan" isrequired="true" />
                </div>
                <div class="col-md-12">
                    <x-librarian.input.cnfrm-checkbox />
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">Simpan kunjungan</button>
            </div>
            </form>
        </div>
    </div>
</x-librarian-layout>
