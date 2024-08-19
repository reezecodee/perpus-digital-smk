@extends('layouts.pustakawan_layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <form id="save-form" action="" method="POST">
                @csrf
                <div class="d-flex justify-content-end align-items-center">
                    <div class="form-group">
                        <select name="penerima" class="form-control select2" required>
                            <option selected>--Pilih calon peminjam--</option>
                            <option value="Ambatukam">Ambatukam</option>
                            <option value="John Doe">John Doe</option>
                            <option value="Jane Doe">Jane Doe</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Subject</label>
                    <input type="text" name="subject" class="form-control" placeholder="Subject:">
                </div>
                <textarea id="editor" name="pesan"></textarea>
                <button type="submit" class="btn btn-primary mt-4">Kirim notifikasi</button>
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
                        <th>Isi pesan</th>
                        <th>Tgl pengiriman</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notifications as $item)
                        <tr>
                            <td>{{ $item->receiver->nama }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->pesan }}</td>
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
