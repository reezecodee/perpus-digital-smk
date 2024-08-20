document.addEventListener('DOMContentLoaded', function() {
    const imageUpload = document.getElementById('imageUpload');
    const imagePreview = document.getElementById('imagePreview');
    const errorMessage = document.getElementById(
        'error-message');

    imageUpload.addEventListener('change', function() {
        const file = this.files[0];
        const maxSize = 2 * 1024 * 1024;

        if (file) {
            const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'];
            if (!validTypes.includes(file.type)) {
                errorMessage.textContent =
                    'Jenis file tidak valid. Silakan unggah file gambar (JPG, PNG, GIF, SVG).';
                errorMessage.style.display = 'block';
                imagePreview.style.display = 'none';
                return;
            }

            if (file.size > maxSize) {
                errorMessage.textContent = 'Ukuran file terlalu besar. Maksimal ukuran adalah 2MB.';
                errorMessage.style.display = 'block';
                imagePreview.style.display = 'none';
                return;
            }

            errorMessage.style.display = 'none';

            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });
});