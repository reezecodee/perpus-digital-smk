@extends('layouts.pdf-layout')
@section('content')
<div style="text-align: center">Data Laporan Bantuan</div>
<table class="table-container" style="font-size: 14px">
    <thead>
        <tr>
            <th>Nama pelapor</th>
            <th>Email pelapor</th>
            <th>Subject</th>
            <th>Kategori</th>
            <th>Laporan</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($helps as $item)   
        <tr>
            <td>{{ $item->user->nama }}</td>
            <td>{{ $item->user->email }}</td>
            <td>{{ $item->subject }}</td>
            <td>{{ $item->kategori }}</td>
            <td>{{ $item->laporan }}</td>
            <td>{{ $item->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection