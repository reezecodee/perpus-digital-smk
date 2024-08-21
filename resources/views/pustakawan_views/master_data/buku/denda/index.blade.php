@extends('pustakawan_views.layouts.main')
@section('master_data_content')
    @include('pustakawan_views.components.card.fine-nav-card')
    <div class="card">
        <div class="card-body">
            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Judul buku</th>
                        <th>Denda terlambat</th>
                        <th>Denda buku rusak</th>
                        <th>Denda buku tidak kembali</th>
                        @can('manajemen peminjaman')
                            <th>Action</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fines as $item)
                        <tr>
                            <td>{{ $item->book->judul }}</td>
                            <td>{{ $item->denda_terlambat }}</td>
                            <td>{{ $item->denda_rusak }}</td>
                            <td>{{ $item->denda_tidak_kembali }}</td>
                            <td>
                                @include('pustakawan_views.components.button.edit-btn', [
                                    'route' => route('edit_book', ['format' => 'fisik', 'id' => $item->book->id]),
                                ])
                                @include('pustakawan_views.components.button.delete-btn', [
                                    'id' => $item->id,
                                    'route' => route('delete_fine', $item->id),
                                ])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
