@extends('layouts.pdf-layout')
@section('content')
<div style="text-align: center">Data {{ $role }}</div>
<table class="table-container" style="font-size: 14px">
    <thead>
        <tr>
            <th>Username</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $item)   
        <tr>
            <td>{{ $item->username }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->telepon }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->jk }}</td>
            <td>{{ $item->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection