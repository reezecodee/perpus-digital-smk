@extends('layouts.pdf-layout')
@section('content')
<table border="1" cellspacing="0" cellpadding="10" style="font-size: 14px">
    <thead>
        <tr>
            <th>Nama pelapor</th>
            <th>Email pelapor</th>
            <th>Kategori laporan</th>
            <th>Subject</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $data->user->nama }}</td>
            <td>{{ $data->user->email }}</td>
            <td>{{ $data->kategori }}</td>
            <td>{{ $data->subject }}ppppppp pppppp</td>
            <td>{{ $data->created_at }}</td>
        </tr>
    </tbody>
</table>
<br>
<div style="text-align: center; font-weight: bold">Laporan</div>
<div style="text-align: justify">{{ $data->laporan }}</div>

@endsection
