document.addEventListener('DOMContentLoaded', function() {
    const uploadCoverBtn = document.getElementById('uploadCoverBtn');
    const fileInputCover = document.getElementById('fileInputCover');
    const coverPreview = document.getElementById('coverPreview');
    const errorMessage = document.getElementById('error-message');
    const fileName = document.getElementById('file-name-cover');

    uploadCoverBtn.addEventListener('click', () => {
        fileInputCover.click();
    });

    fileInputCover.addEventListener('change', function() {
        let file = this.files[0];

        if (file) {
            if (file.size > 2 * 1024 * 1024) { // 2MB dalam byte
                errorMessage.textContent = 'Ukuran file tidak boleh lebih dari 2MB.';
                Swal.fire({
                    title: 'Gagal upload!',
                    text: 'Ukuran file tidak boleh lebih dari 2MB.',
                    icon: 'error',
                    confirmButtonText: 'Oke'
                });
                errorMessage.style.display = 'block';
                fileName.textContent = '';
                coverPreview.style.display = 'none';
                // if (submitBtn) {
                //     submitBtn.disabled = true;
                // }
                return; 
            }

            const img = new Image();
            img.src = URL.createObjectURL(file);
            img.onload = function() {
                if (img.width === 650 && img.height === 974) {
                    errorMessage.style.display = 'none';
                    coverPreview.src = img.src;
                    fileName.innerHTML = file.name;
                    coverPreview.style.display = 'block';
                    // if (submitBtn) {
                    //     submitBtn.disabled = false;
                    // }
                } else {
                    errorMessage.textContent = 'Gambar harus memiliki resolusi 650 x 974 piksel.';
                    Swal.fire({
                        title: 'Gagal upload!',
                        text: 'Gambar harus memiliki resolusi 650 x 974 piksel.',
                        icon: 'error',
                        confirmButtonText: 'Oke'
                    });
                    errorMessage.style.display = 'block';
                    fileName.textContent = '';
                    coverPreview.style.display = 'none';
                    // if (submitBtn) {s
                    //     submitBtn.disabled = true;
                    // }
                }
            };
        } else {
            errorMessage.textContent = 'Silakan pilih file gambar.';
            errorMessage.style.display = 'block';
            fileName.textContent = '';
            coverPreview.style.display = 'none';
            // if (submitBtn) {
            //     submitBtn.disabled = true;
            // }
        }
    });

    const uploadPDFBtn = document.getElementById('uploadPDFBtn');
    const fileInputPDF = document.getElementById('fileInputPDF');
    const fileNamePDF = document.getElementById('fileNamePDF');
    const errorMessagePDF = document.getElementById('errorMessagePDF');

    uploadPDFBtn.addEventListener('click', () => {
        fileInputPDF.click();
    });

    fileInputPDF.addEventListener('change', function() {
        const file = this.files[0];

        if (file) {
            if (file.type === 'application/pdf') {
                errorMessagePDF.style.display = 'none';
                fileNamePDF.textContent = file.name;
                // if (submitBtn) {
                //     submitBtn.disabled = false;
                // }
            } else {
                errorMessagePDF.textContent = 'File harus berformat PDF.';
                Swal.fire({
                    title: 'Gagal upload!',
                    text: 'File yang dipilih bukan PDF.',
                    icon: 'error',
                    confirmButtonText: 'Oke'
                });
                errorMessagePDF.style.display = 'block';
                fileNamePDF.textContent = '';
                // if (submitBtn) {
                //     submitBtn.disabled = true;
                // }
            }
        } else {
            errorMessagePDF.textContent = 'Silakan pilih file PDF.';
            errorMessagePDF.style.display = 'block';
            fileNamePDF.textContent = '';
            // if (submitBtn) {
            //     submitBtn.disabled = true;
            // }
        }
    });
});
