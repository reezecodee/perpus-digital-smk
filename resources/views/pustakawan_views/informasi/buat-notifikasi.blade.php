@extends('layouts.pustakawan-layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <form id="notif-form" action="{{ route('send_notification') }}" method="post">
                @csrf
                <div class="d-flex justify-content-end align-items-center">
                    <x-pustakawan.input.tom-select-notif name="penerima_id" placeholder="Pilih akun pengguna"
                        :options="$receivers" />
                </div>
                <div class="form-group">
                    <label for="">Subject</label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul') }}"
                        placeholder="Subject:">
                    @error('judul')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <x-pustakawan.input.froala name="pesan" />
                <button type="button" onclick="confirmSendNotif()" class="btn btn-primary mt-4">Kirim notifikasi</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5>Notifikasi yang Anda buat sebelumnya</h5>
            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Penerima</th>
                        <th>Judul</th>
                        <th>Tgl pengiriman</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notifications as $item)
                        <tr>
                            <td>{{ $item->receiver->nama }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->tgl_pengiriman }}</td>
                            <td>
                                <div class="dropdown-center">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fas fa-list"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Hapus</a></li>
                                        <li><a class="dropdown-item" href="#">Detail</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
