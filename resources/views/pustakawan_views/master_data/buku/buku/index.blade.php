@extends('pustakawan_views.layouts.main')
@section('master_data_content')
    <x-pustakawan.card.book-nav :format="$format" />
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
                            <td>
                                <img src="{{ asset('storage/img/cover/' . ($item->cover_buku ?? 'unknown_cover.png')) }}"
                                    alt="" width="60" class="rounded-md" loading="lazy">
                            </td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->author }}</td>
                            <td>{{ $item->isbn }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <x-pustakawan.button.detail :route="route('detail_book', ['format' => $format, 'id' => $item->id])" />
                                <x-pustakawan.button.edit :route="route('edit_book', ['format' => $format, 'id' => $item->id])" />
                                <x-pustakawan.button.delete :id="$item->id" :route="route('delete_book', $item->id)" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
