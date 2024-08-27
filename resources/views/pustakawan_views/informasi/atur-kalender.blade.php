@extends('layouts.pustakawan-layout')
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
                                <form action="{{ route('add_schedule') }}" method="post" id="add-form">
                                    @csrf
                                    <x-pustakawan.input.basic label="Tanggal mulai" name="tanggal_mulai" :value="old('tanggal_mulai')"
                                        placeholder="" type="date" :isrequired="true" />
                                    <x-pustakawan.input.basic label="Tanggal selesai" name="tanggal_selesai"
                                        :value="old('tanggal_selesai')" placeholder="" type="date" :isrequired="false" />
                                    <x-pustakawan.input.basic label="Keterangan" name="keterangan" :value="old('keterangan')"
                                        placeholder="Masukkan keterangan" type="text" :isrequired="true" />
                                    <x-pustakawan.input.pure-select label="Pilih warna" name="warna" :options="['Hijau', 'Kuning', 'Merah']"
                                        :isrequired="true" />
                                    <button class="btn btn-primary" type="button" onclick="confirmAdd()">Tambahkan
                                        acara</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5>Keseluruhan jadwal tahun ini</h5>
            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Tangal mulai</th>
                        <th>Tanggal selesai</th>
                        <th>Keterangan</th>
                        <th>Warna tanda</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $item)
                        <tr>
                            <td>{{ $item->tanggal_mulai }}</td>
                            <td>{{ $item->tanggal_selesai ?? '-' }}</td>
                            <td>{{ $item->keterangan }}</td>
                            @if ($item->warna == 'Merah')
                                <td>
                                    <div class="badge bg-danger">{{ $item->warna }}</div>
                                </td>
                            @elseif($item->warna == 'Kuning')
                                <td>
                                    <div class="badge bg-warning">{{ $item->warna }}</div>
                                </td>
                            @else
                                <td>
                                    <div class="badge bg-success">{{ $item->warna }}</div>
                                </td>
                            @endif
                            <td align="center">
                                <x-pustakawan.button.delete :id="$item->id" :route="route('delete_schedule', $item->id)" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <script src="/js/calendar.js"></script>
@endsection
