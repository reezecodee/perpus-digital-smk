@extends('pustakawan_views.layouts.main')
@section('master_data_content')
    <x-pustakawan.card.fine-nav />
    <div class="card">
        <div class="card-body">
            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Judul buku</th>
                        <th>Denda terlambat</th>
                        <th>Denda buku rusak</th>
                        <th>Denda buku tidak kembali</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fines as $item)
                        <tr>
                            <td>{{ $item->book->judul }}</td>
                            <td>{{ $item->denda_terlambat }}</td>
                            <td>{{ $item->denda_rusak }}</td>
                            <td>{{ $item->denda_tidak_kembali }}</td>
                            <td align="center">
                                <x-pustakawan.button.edit :route="route('edit_book', ['format' => 'fisik', 'id' => $item->book->id])" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
