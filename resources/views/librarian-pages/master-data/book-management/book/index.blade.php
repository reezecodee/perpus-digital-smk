<x-librarian-layout :title="$title" :heading="$heading">
    <x-librarian.card.book-nav :format="$format" />
    <div class="card">
        <div class="card-body">
            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Cover</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>ISBN</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $item)
                        <tr>
                            <td align="center">
                                <img src="{{ asset('storage/img/cover/' . ($item->cover_buku ?? 'unknown_cover.png')) }}"
                                    alt="" width="60" class="rounded-md" loading="lazy">
                            </td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->author }}</td>
                            <td>{{ $item->isbn }}</td>
                            <td>{{ $item->status }}</td>
                            <td align="center">
                                <x-librarian.button.detail :route="route('detail_book', ['format' => $format, 'id' => $item->id])" />
                                <x-librarian.button.edit :route="route('edit_book', ['format' => $format, 'id' => $item->id])" />
                                <x-librarian.button.delete :id="$item->id" :route="route('delete_book', $item->id)" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-librarian-layout>
