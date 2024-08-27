@extends('pustakawan_views.layouts.main')
@section('master_data_content')
    <x-pustakawan.card.basic-nav :routepdf="1" :routeexcel="1" />
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
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
@endsection
