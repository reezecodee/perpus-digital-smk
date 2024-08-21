@extends('pustakawan_views.layouts.main')
@section('master_data_content')
    @include('pustakawan_views.components.card.user-nav-card')
    @include('pustakawan_views.components.modal.import-user-modal')
    <table id="data-table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Username</th>
                <th>Nama</th>
                <th>{{ $role != 'peminjam' ? 'NIP' : 'NIS' }}</th>
                @if ($role == 'peminjam')
                    <th>NISN</th>
                @endif
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
                <tr>
                    <td>
                        <img src="{{ asset('storage/img/profile/' . ($item->photo ?? 'unknown.jpg')) }}" alt=""
                            width="40" class="rounded-circle" loading="lazy">
                    </td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nip_nis }}</td>
                    @if ($role == 'peminjam')
                        <td>{{ $item->nisn }}</td>
                    @endif
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        @include('pustakawan_views.components.button.detail-btn', [
                            'route' => route('detail_user', ['role' => $role, 'id' => $item->id]),
                        ])
                        @include('pustakawan_views.components.button.edit-btn', [
                            'route' => route('edit_user', ['role' => $role, 'id' => $item->id]),
                        ])
                        @include('pustakawan_views.components.button.delete-btn', [
                            'id' => $item->id,
                            'route' => route('delete_user', $item->id)
                        ])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
