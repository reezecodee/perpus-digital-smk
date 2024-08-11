function copyNominal() {
    let nominalText = document.getElementById("nominal").innerText;
    let copyBtn = document.getElementById('copy-btn');

    copyBtn.innerHTML = 'Nominal disalin';
    copyBtn.classList.add('bg-red-primary', 'text-white');

    let filteredNominal = nominalText.replace(/[Rp.\s]/g, '');

    let tempInput = document.createElement("input");
    tempInput.value = filteredNominal;
    document.body.appendChild(tempInput);
    
    tempInput.select();
    document.execCommand("copy");
    
    document.body.removeChild(tempInput);

    setTimeout(function() {
        copyBtn.innerHTML = 'Salin nominal';
        copyBtn.classList.remove('bg-red-primary', 'text-white');
    }, 3000);
}

function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('imagePreview');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
        }

        reader.readAsDataURL(input.files[0]);
    }
}

