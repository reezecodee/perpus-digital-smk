@extends('layouts.pustakawan-layout')
@section('content')
    @if ($data->status == 'Terkena denda' && $data->keterangan_denda != 'Tidak ada')
        <div class="card">
            <div class="card-body bg-danger rounded p-3">
                <h5 class="text-bold">Peminjam ini terkena denda</h5>
                <hr class="border-light">
                <div class="d-flex justify-content-around align-items-center" style="height: 7rem">
                    <x-pustakawan.input.basic-disable label="Status peminjaman" name="status" :value="$data->status" />
                    <x-pustakawan.input.basic-disable label="Keterangan denda" name="keterangan_denda" :value="$data->keterangan_denda" />
                    {{-- @include('pustakawan_views.components.input.input-disable', [
                        'label' => 'Jenis kelamin',
                        'name' => 'jk',
                        'value' => $data->jk,
                    ]) --}}
                    <div class="form-group text-center">
                        <label for="">Denda yang harus dibayarkan</label>
                        @if ($data->keterangan_denda == 'Denda buku rusak')
                            <input type="text" class="form-control"
                                value="{{ formatRupiah($data->book->fine->denda_rusak) }}" disabled>
                        @elseif($data->keterangan_denda == 'Denda buku terlambat')
                            <input type="text" class="form-control"
                                value="{{ formatRupiah($data->book->fine->denda_terlambat) }}" disabled>
                        @elseif($data->keterangan_denda == 'Denda buku tidak kembali')
                            <input type="text" class="form-control"
                                value="{{ formatRupiah($data->book->fine->denda_tidak_kembali) }}" disabled>
                        @else
                            <input type="text" class="form-control" value="-" disabled>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <x-pustakawan.input.basic-disable label="Nama peminjam" name="nama" :value="$data->peminjam->nama" />
                        </div>
                        <div class="col-md-6">
                            <x-pustakawan.input.basic-disable label="Nomor Induk Siswa" name="nip_nis" :value="$data->peminjam->nip_nis" />
                        </div>
                        <div class="col-md-6">
                            <x-pustakawan.input.basic-disable label="NISN" name="nisn" :value="$data->peminjam->nisn" />
                        </div>
                        <div class="col-md-6">
                            <x-pustakawan.input.basic-disable label="Email" name="email" :value="$data->peminjam->email" />
                        </div>
                        <div class="col-md-6">
                            <x-pustakawan.input.basic-disable label="Telepon" name="telepon" :value="$data->peminjam->telepon" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-center">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('storage/img/profile/' . ($data->peminjam->photo ?? 'unknown.jpg')) }}"
                                alt="" width="200" class="rounded-circle shadow">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <x-pustakawan.input.basic-disable label="Judul buku" name="judul" :value="$data->book->judul" />
                        </div>
                        <div class="col-md-6">
                            <x-pustakawan.input.basic-disable label="Kode peminjaman" name="kode_peminjaman"
                                :value="$data->kode_peminjaman" />
                        </div>
                        <div class="col-md-6">
                            <x-pustakawan.input.basic-disable label="Tanggal pinjam" name="peminjaman" :value="$data->peminjaman" />
                        </div>
                        <div class="col-md-6">
                            <x-pustakawan.input.basic-disable label="Jatuh tempo" name="jatuh_tempo" :value="$data->jatuh_tempo" />
                        </div>
                        <div class="col-md-6">
                            <x-pustakawan.input.basic-disable label="Tanggal dikembalikan" name="pengembalian" :value="$data->pengembalian" />
                        </div>
                        <div class="col-md-6">
                            <x-pustakawan.input.basic-disable label="Status peminjaman" name="status" :value="$data->status" />
                        </div>
                        <div class="col-md-12">
                            <x-pustakawan.input.textarea-disable label="Keterangan peminjaman"  name="keterangan" :value="$data->keterangan" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-center">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('storage/img/cover/' . ($data->book->cover_buku ?? 'unknown_cover.png')) }}"
                                alt="" width="200" class="rounded shadow">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
