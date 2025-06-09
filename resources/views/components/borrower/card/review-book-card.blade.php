<div class="w-full border p-5 rounded-md shadow-md mb-7">
    <div>
        <div class="flex items-center mb-1 lg:mb-4">
            <img src="{{ asset('storage/img/cover/' . ($item->book->cover_buku ?? 'unknown_cover.jpg')) }}"
                class="rounded-md self-start w-28" loading="lazy">
            <div class="text-xs ml-5 w-full self-start">
                <a href="{{ route('show.bookDetail', $item->book->id) }}" class="inline-block mb-1">
                    <h1 class="text-base lg:text-lg font-bold">{{ $item->book->judul }}</h1>
                </a>
                <form method="post" action="{{ route('store.comment', $item->id) }}">
                    @csrf
                    <input type="hidden" value="{{ $item->book->id }}" name="buku_id" id="">
                    <input type="hidden" value="{{ $item->peminjam->id }}" name="peminjam_id" id="">
                    <div class="rate">
                        <input type="radio" id="star5" name="rating" value="5" required />
                        <label for="star5" title="5">5 stars</label>
                        <input type="radio" id="star4" name="rating" value="4" required />
                        <label for="star4" title="4">4 stars</label>
                        <input type="radio" id="star3" name="rating" value="3" required />
                        <label for="star3" title="3">3 stars</label>
                        <input type="radio" id="star2" name="rating" value="2" required />
                        <label for="star2" title="2">2 stars</label>
                        <input type="radio" id="star1" name="rating" value="1" required />
                        <label for="star1" title="1">1 star</label>
                    </div>
                    @error('rating')
                        <span class="text-red-primary font-semibold text-sm">{{ $message }}</span>
                    @enderror
                    <br><br>
                    <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50">
                        <div class="px-4 py-2 bg-white rounded-t-lg">
                            <label for="" class="sr-only">Komentarmu</label>
                            <textarea id="" rows="2" name="komentar"
                                class="w-full px-0 text-sm text-gray-900 bg-white border-0 focus:ring-transparent focus:border-transparent"
                                placeholder="Tulis komentarmu..." required></textarea>
                            @error('komentar')
                                <span class="text-red-primary font-semibold text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex items-center justify-between px-3 py-2 border-t">
                            <x-borrower.button.confirm-btn :nomargin="true"
                                modaltarget="review-modal-{{ $iteration }}">
                                Berikan komentar
                            </x-borrower.button.confirm-btn>
                        </div>
                    </div>

                    <x-borrower.modal.confirm-modal
                        question="Apakah Anda yakin ingin memberikan komentar terhadap buku ini?. Komentar yang dikirimkan tidak dapat di ubah lagi"
                        okbtn="Ya, tentu" nobtn="Batalkan" modalname="review-modal-{{ $iteration }}" />
                </form>
            </div>
        </div>
    </div>
</div>
