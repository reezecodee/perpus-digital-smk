@extends('pustakawan_views.layouts.main')
@section('master_data_content')
    <x-pustakawan.card.visit-nav />
    <div class="card">
        <div class="card-body">
            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama pengunjung</th>
                        <th>Tanggal kunjungan</th>
                        <th>Keterangan kunjungan</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($visits as $item)
                        <tr>
                            <td>{{ $item->peminjam->nama }}</td>
                            <td>{{ $item->tanggal_kunjungan }}</td>
                            <td>{{ $item->keterangan_kunjungan }}</td>
                            <td>{{ $item->status_kunjungan }}</td>
                            <td>
                                <x-pustakawan.button.group-visit :item="$item" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
