@extends('layouts.pustakawan_layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <form id="save-form" action="" method="POST">
                @csrf
                <div class="d-flex justify-content-end align-items-center mb-4">
                    <span class="mr-2">Penerima:</span>
                    <select name="penerima" class="form-control select2 w-25" required>
                        <option selected>--Pilih penerima--</option>
                        <option value="Ambatukam">Ambatukam</option>
                        <option value="John Doe">John Doe</option>
                        <option value="Jane Doe">Jane Doe</option>
                    </select>
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
                    <tr>
                        <td>Ambasingh</td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla neque quasi, perferendis
                            doloremque qui doloribus facilis tenetur fugiat possimus ullam.</td>
                        <td>20-Juni-2024</td>
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
                </tbody>
            </table>
        </div>
    </div>
@endsection
