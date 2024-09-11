<div class="w-36">
    <a href="{{ route('show.bookDetail', $item->id) }}">
        <img src="{{ asset('storage/img/cover/' . ($item->cover_buku ?? 'unknown_cover.jpg')) }}" alt=""
            srcset="" class="rounded-lg mb-2 hvr-float" loading="lazy">
    </a>
    <p class="text-sm font-bold truncate-text leading-none mb-1">{{ $item->judul }} </p>
    <p class="text-xs font-medium truncate">{{ $item->category->nama_kategori }} |
        {{ $item->author }}
    </p>
    <p class="text-xs font-medium"><i class="fas fa-star text-yellow-300"></i>
        {{number_format($item->review_avg_rating, 1) }} {{ $item->format == 'Fisik' ? "- Tersedia " . (isset($item->total_books_available) ? $item->total_books_available : 0) : '- E-book' }}
    </p>
</div>
