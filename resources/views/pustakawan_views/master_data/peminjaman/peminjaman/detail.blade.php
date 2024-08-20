@extends('layouts.pustakawan_layout')
@section('content')
    @if ($data->status == 'Terkena denda' && $data->keterangan_denda != 'Tidak ada')
        <div class="card">
            <div class="card-body bg-danger rounded p-3">
                <h5 class="text-bold">Peminjam ini terkena denda</h5>
                <hr class="border-light">
                <div class="d-flex justify-content-around align-items-center" style="height: 7rem">
                    <div class="form-group text-center">
                        <label for="">Status peminjaman</label>
                        <input type="text" class="form-control" value="{{ $data->status }}" disabled>
                    </div>
                    <div class="form-group text-center">
                        <label for="">Keterangan denda</label>
                        <input type="text" class="form-control" value="{{ $data->keterangan_denda }}" disabled>
                    </div>
                    <div class="form-group text-center">
                        <label for="">Denda yang harus dibayarkan</label>
                        @if ($data->keterangan_denda == 'Denda buku rusak')
                            <input type="text" class="form-control" value="{{ formatRupiah($data->book->fine->denda_rusak) }}"
                                disabled>
                        @elseif($data->keterangan_denda == 'Denda buku terlambat')
                            <input type="text" class="form-control" value="{{ formatRupiah($data->book->fine->denda_terlambat) }}"
                                disabled>
                        @elseif($data->keterangan_denda == 'Denda buku tidak kembali')
                            <input type="text" class="form-control" value="{{ formatRupiah($data->book->fine->denda_tidak_kembali) }}"
                                disabled>
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
                            <div class="form-group">
                                <label for="" class="mb-0">Nama peminjam</label>
                                <input type="text" class="form-control" value="{{ $data->peminjam->nama }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="mb-0">Nomor Induk Siswa</label>
                                <input type="text" class="form-control" value="{{ $data->peminjam->nip_nis }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="mb-0">NISN</label>
                                <input type="text" class="form-control" value="{{ $data->peminjam->nisn }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="mb-0">Email</label>
                                <input type="text" class="form-control" value="{{ $data->peminjam->email }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="mb-0">Telepon</label>
                                <input type="text" class="form-control" value="{{ $data->peminjam->telepon }}" disabled>
                            </div>
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
                            <div class="form-group">
                                <label for="" class="mb-0">Judul buku</label>
                                <input type="text" class="form-control" value="{{ $data->book->judul }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="mb-0">Kode peminjaman</label>
                                <input type="text" class="form-control" value="{{ $data->kode_peminjaman }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="mb-0">Tanggal pinjam</label>
                                <input type="text" class="form-control" value="{{ $data->peminjaman }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="mb-0">Jatuh tempo</label>
                                <input type="text" class="form-control" value="{{ $data->jatuh_tempo }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="mb-0">Tanggal dikembalikan</label>
                                <input type="text" class="form-control" value="{{ $data->pengembalian ?? '-' }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="mb-0">Status peminjaman</label>
                                <input type="text" class="form-control" value="{{ $data->status }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="" class="mb-0">Keterangan peminjaman</label>
                                <textarea rows="5" class="form-control" disabled>{{ $data->keterangan }}</textarea>
                            </div>
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
