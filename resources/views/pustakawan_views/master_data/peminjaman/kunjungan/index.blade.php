@extends('pustakawan_views.layouts.main')
@section('master_data_content')
    @include('pustakawan_views.components.card.visit-nav-card')
    <div class="card">
        <div class="card-body">
            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama pengunjung</th>
                        <th>Tanggal kunjungan</th>
                        <th>Keterangan kunjungan</th>
                        @can('manajemen peminjaman')
                            <th>Action</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($visits as $item)
                        <tr>
                            <td>{{ $item->peminjam->nama }}</td>
                            <td>{{ $item->tanggal_kunjungan }}</td>
                            <td>{{ $item->keterangan_kunjungan }}</td>
                            <td>
                                @include('pustakawan_views.components.button.btn-group-visit')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
