<a href="{{ $url }}" class="flex flex-col items-center text-center">
    <div class="p-2 {{ $background ?? '' }} rounded-lg inline-block mb-1 hvr-shrink">
        {{ $slot }}
    </div>
    <span class="text-xs text-center font-medium block w-full max-w-[100px] whitespace-normal">{{ $menuTitle }}</span>
</a>
