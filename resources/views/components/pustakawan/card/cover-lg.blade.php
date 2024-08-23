<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-center mb-4">
            <img src="{{ asset('storage/img/cover/' . ($data->cover_buku ?? 'unknown_cover.png')) }}"
                class="w-25 rounded" alt="" srcset="">
        </div>
        <div class="d-flex justify-content-center gap-3">
            @if ($format == 'elektronik')
                <a href="{{ route('read_e_book', $data->id) }}" class="mr-2">
                    <button class="btn btn-warning"><i class="fas fa-book"></i> Baca E-book</button>
                </a>
                <a href="{{ asset('storage/pdf/' . $data->e_book_file) }}" class="mr-2" download>
                    <button class="btn btn-success"><i class="fas fa-download"></i> Download E-book</button>
                </a>
            @endif
            <a href="{{ route('edit_book', ['format' => $format, 'id' => $data->id]) }}">
                <button class="btn btn-primary"><i class="fas fa-pen"></i> Perbarui data</button>
            </a>
        </div>
    </div>
</div>