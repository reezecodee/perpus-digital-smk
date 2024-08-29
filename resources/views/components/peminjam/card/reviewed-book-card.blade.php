<div class="w-full border p-5 rounded-md shadow-md mb-7">
    <div>
        <div class="flex items-center mb-1 lg:mb-4">
            <img src="{{ asset('storage/img/cover/' . ($item->book->cover_buku ?? 'unknown_cover.jpg')) }}"
                class="rounded-md self-start w-28" loading="lazy">
            <div class="text-xs ml-5 w-full self-start">
                <a href="{{ route('detail_buku', $item->book->id) }}" class="inline-block mb-1">
                    <h1 class="text-base lg:text-lg font-bold">{{ $item->book->judul }}</h1>
                </a>
                <div>
                    <div class="rated">
                        <input type="radio" id="star5" {{ $item->rating == 5 ? 'checked' : '' }} disabled />
                        <label for="star5" title="5">5 stars</label>
                        <input type="radio" id="star4" {{ $item->rating >= 4 ? 'checked' : '' }} disabled />
                        <label for="star4" title="4">4 stars</label>
                        <input type="radio" id="star3" {{ $item->rating >= 3 ? 'checked' : '' }} disabled />
                        <label for="star3" title="3">3 stars</label>
                        <input type="radio" id="star2" {{ $item->rating >= 2 ? 'checked' : '' }} disabled />
                        <label for="star2" title="2">2 stars</label>
                        <input type="radio" id="star1" {{ $item->rating >= 1 ? 'checked' : '' }} disabled />
                        <label for="star1" title="1">1 star</label>
                    </div>                   
                    <br><br>
                    <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50">
                        <div class="px-3 bg-white rounded-lg">
                            <textarea id="" rows="2"
                                class="w-full px-0 text-sm text-gray-900 bg-white border-0 focus:ring-transparent focus:border-transparent" disabled
                                >{{ $item->komentar }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>