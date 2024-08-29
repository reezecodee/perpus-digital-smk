<div id="loginPopup"
    class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="p-8 rounded shadow-md w-1/2 relative">
        <div id="popupImages" class="flex flex-wrap gap-4 justify-center relative popup-enter">
            @foreach ($popupimages as $index => $image)
                <a href="{{ $image->link ? $image->link : 'javascript:void(0)' }}">
                    <div class="popup-image {{ $index > 0 ? 'hidden' : '' }}" data-index="{{ $index }}">
                        <img src="{{ asset('storage/img/popup/' . ($image->popup_file ?? 'unknown.jpg')) }}"
                            alt="Popup Image" class="w-full object-cover rounded">
                    </div>
                </a>
            @endforeach
            <button id="closePopup"
                class="w-12 h-12 bg-red-primary rounded-full border-2 border-white m-2 text-white absolute -top-5 right-0"><i
                    class="fas fa-times"></i></button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const popupImages = document.querySelectorAll('.popup-image');
        const closeButton = document.getElementById('closePopup');
        let currentPopupIndex = 0;

        function showNextPopup() {
            if (currentPopupIndex < popupImages.length) {
                popupImages[currentPopupIndex].classList.remove('hidden');
            }
        }

        function hideCurrentPopup() {
            if (currentPopupIndex < popupImages.length) {
                popupImages[currentPopupIndex].classList.add('hidden');
                popupImages[currentPopupIndex].classList.remove('popup-enter');
                currentPopupIndex++;
                if (currentPopupIndex < popupImages.length) {
                    popupImages[currentPopupIndex].classList.remove('hidden');
                    popupImages[currentPopupIndex].classList.add('popup-enter');
                } else {
                    document.getElementById('loginPopup').classList.add(
                        'hidden');
                }
            }

        }

        closeButton.addEventListener('click', hideCurrentPopup);

        showNextPopup();
    });
</script>
