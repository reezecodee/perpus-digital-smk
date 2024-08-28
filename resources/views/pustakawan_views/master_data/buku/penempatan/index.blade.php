@extends('pustakawan_views.layouts.main')
@section('master_data_content')
    <x-pustakawan.card.basic-nav :routepdf="1" :routeexcel="1" :addbtn="true" :addroute="route('add_placement')"
        title="Tambah penempatan" />
    <table id="data-table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama rak</th>
                <th>Buku</th>
                <th>Jumlah buku</th>
                <th>Jumlah saat ini</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($placements as $item)
                <tr>
                    <td>{{ $item->shelf->nama_rak }}</td>
                    <td>{{ $item->book->judul }}</td>
                    <td>{{ $item->jumlah_buku }}</td>
                    <td>{{ $item->buku_saat_ini }}</td>
                    <td align="center">
                        <x-pustakawan.button.edit :route="route('edit_placement', $item->id)" />
                        <x-pustakawan.button.delete :id="$item->id" :route="route('delete_placement', $item->id)" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
