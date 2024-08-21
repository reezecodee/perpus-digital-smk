@extends('pustakawan_views.layouts.main')
@section('master_data_content')
    @include('pustakawan_views.components.card.loan-nav-card')
    <div class="card">
        <div class="card-body">
            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Judul buku</th>
                        <th>Tgl pinjam</th>
                        <th>Dikembalikan</th>
                        <th>Jatuh tempo</th>
                        <th>Status</th>
                        @can('manajemen peminjaman')
                            <th>Action</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($borrowers as $item)
                        <tr>
                            <td>{{ $item->peminjam->nama }}</td>
                            <td class="truncate-text">{{ $item->book->judul }}</td>
                            <td>{{ $item->peminjaman }}</td>
                            <td>{{ $item->pengembalian }}</td>
                            <td>{{ $item->jatuh_tempo }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                @include('pustakawan_views.components.button.btn-group')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
