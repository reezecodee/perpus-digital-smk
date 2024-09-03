<x-librarian-layout :title="$title" :heading="$heading">
    <x-librarian.card.loan-nav />
    <div class="card">
        <div class="card-body">
            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Judul buku</th>
                        <th>Tgl pinjam</th>
                        <th>Dikembalikan</th>
                        <th>Jatuh tempo</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($borrowers as $item)
                        <tr>
                            <td>{{ $item->peminjam->nama }}</td>
                            <td class="truncate-text">{{ $item->book->judul }}</td>
                            <td>{{ $item->peminjaman }}</td>
                            <td>{{ $item->pengembalian }}</td>
                            <td>{{ $item->jatuh_tempo }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <x-librarian.button.btn-group :item="$item" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-librarian-layout>