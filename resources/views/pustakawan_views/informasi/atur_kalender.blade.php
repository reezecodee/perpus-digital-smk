@extends('layouts.pustakawan_layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="sticky-top mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambahkan jadwal</h4>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Tanggal</label>
                                        <input type="date" name="tanggal" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Keterangan</label>
                                        <input type="text" name="keterangan" class="form-control"
                                            placeholder="Masukkan keterangan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Legend color</label>
                                        <select name="legend_color" class="form-control" required>
                                            <option selected>--Pilih warna--</option>
                                            <option value="Hijau">Hijau</option>
                                            <option value="Kuning">Kuning</option>
                                            <option value="Merah">Merah</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-primary">Tambahkan acara</button>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <!-- THE CALENDAR -->
                            <div id="calendar"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>
@endsection
