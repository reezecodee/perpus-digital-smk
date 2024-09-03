@extends('layouts.pdf-layout')
@section('content')
<div style="text-align: center">Data Laporan Log Aktivitas Users</div>
<table class="table-container" style="font-size: 14px">
    <thead>
        <tr>
            <th>Nama pengguna</th>
            <th>Peran pengguna</th>
            <th>Keterangan</th>
            <th>Waktu</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($logs as $item)   
        <tr>
            <td>{{ $item->user->nama }}</td>
            <td>{{ $item->user->getRoleNames()->first() }}</td>
            <td>{{ $item->keterangan }}</td>
            <td>{{ $item->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection