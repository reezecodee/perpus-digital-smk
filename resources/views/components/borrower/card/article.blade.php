<div class="w-64 flex-shrink-0">
    <a href="">
        <img src="{{ asset('storage/img/thumbnail/' . ($item->thumbnail ?? 'unknown_cover.jpg')) }}"
            alt="" srcset="" class="rounded-lg mb-2" loading="lazy">
    </a>
    <p class="text-sm font-bold mb-1 truncate-text-article">{{ $item->judul }}</p>
    <p class="text-xs font-medium truncate-text-article-dsk">{{ $item->deskripsi }}</p>
    <p class="text-xs font-bold truncate-text-article-dsk">Penulis:
        {{ $item->author->nama }}</p>
</div>