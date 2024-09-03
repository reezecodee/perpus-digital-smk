<x-librarian-layout :title="$title" :heading="$heading">
    <x-librarian.card.user-nav :role="$role" />
    <x-librarian.modal.import-user />
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
                    <td align="center">
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
                    <td align="center">
                        <x-librarian.button.detail :route="route('detail_user', ['role' => $role, 'id' => $item->id])" />
                        <x-librarian.button.edit :route="route('edit_user', ['role' => $role, 'id' => $item->id])" />
                        <x-librarian.button.delete :id="$item->id" :route="route('delete_user', $item->id)" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-librarian-layout>
