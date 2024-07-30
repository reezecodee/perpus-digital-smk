const dropzone = document.getElementById('dropzone');
const fileInput = document.getElementById('fileInput');
const previewContainer = document.getElementById('previewContainer');

dropzone.addEventListener('click', () => {
    fileInput.click();
});

fileInput.addEventListener('change', handleFiles);

dropzone.addEventListener('dragover', (event) => {
    event.preventDefault();
    dropzone.classList.add('dragover');
});

dropzone.addEventListener('dragleave', () => {
    dropzone.classList.remove('dragover');
});

dropzone.addEventListener('drop', (event) => {
    event.preventDefault();
    dropzone.classList.remove('dragover');
    handleFiles(event);
});

function handleFiles(event) {
    const files = event.target.files || event.dataTransfer.files;
    previewContainer.innerHTML = ''; // Clear previous previews

    for (const file of files) {
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();

            reader.onload = (e) => {
                const img = document.createElement('img');
                img.src = e.target.result;
                const removeButton = document.createElement('span');
                removeButton.textContent = 'Remove';
                removeButton.classList.add('remove');
                removeButton.addEventListener('click', () => {
                    previewContainer.removeChild(img);
                    previewContainer.removeChild(removeButton);
                });
                previewContainer.appendChild(img);
                previewContainer.appendChild(removeButton);
            };

            reader.readAsDataURL(file);
        } else {
            alert('Please upload an image file.');
        }
    }
}