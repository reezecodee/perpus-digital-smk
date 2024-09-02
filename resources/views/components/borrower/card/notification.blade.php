<div class="border rounded-lg p-3 mb-3 group {{ $item->status == 'Belum dibaca' ? 'bg-gray-100' : '' }} hover:bg-transparent">
    <div class="flex gap-4">
        @if ($item->status == 'Belum dibaca')
            <img src="https://www.svgrepo.com/show/489040/mail.svg" class="w-20" alt="" srcset="" loading="lazy">
        @else
            <img src="https://www.svgrepo.com/show/489041/mail-open.svg" class="w-20" alt="" srcset="" loading="lazy">
        @endif
        <a href="{{ route('read_notif', $item->id) }}" class="w-full">
            <p class="font-bold leading-5 mb-1 group-hover:text-red-primary truncate-text-notif">
                {{ $item->judul }}</p>
            <p class="text-xs lg:text-sm truncate-text">{{ strip_tags($item->pesan) }}</p>
            <p class="text-xs font-bold mb-0">Pengirim: {{ $item->sender->nama }}</p>
            <p class="text-end text-xs font-medium">{{ $item->created_at->diffForHumans() }}</p>
        </a>
    </div>
</div>
