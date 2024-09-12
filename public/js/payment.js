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

function copyLoanCode(){
    let loanCode = document.getElementById("loan-code").innerText;
    let copyLoanInfo = document.getElementById('copy-loan-info');

    copyLoanInfo.innerHTML = 'Kode disalin';
    let tempInput = document.createElement("input");
    tempInput.value = loanCode;
    document.body.appendChild(tempInput);

    tempInput.select();
    document.execCommand("copy");

    document.body.removeChild(tempInput);

    setTimeout(function() {
        copyLoanInfo.innerHTML = '';
    }, 3000);
}

let noRekening = document.querySelectorAll('.no-rekening');
let copyRekening = document.querySelectorAll('.copy-rekening');
let copyRekeningInfo = document.querySelectorAll('.copy-rekening-info');

document.querySelectorAll('.copy-rekening').forEach((btnCopy) => {
    btnCopy.addEventListener('click', function() {
        // Temukan elemen nomor rekening di elemen `td` yang sama
        const rekeningNumber = this.closest('td').querySelector('.no-rekening').textContent.trim();

        // Jika elemen no-rekening ditemukan, salin teks ke clipboard
        if (rekeningNumber) {
            navigator.clipboard.writeText(rekeningNumber).then(() => {
                // Tampilkan pesan bahwa nomor rekening telah disalin
                const infoMessage = this.querySelector('.copy-rekening-info');
                infoMessage.style.display = 'inline';

                // Sembunyikan pesan setelah beberapa detik
                setTimeout(() => {
                    infoMessage.style.display = 'none';
                }, 2000);
            }).catch((error) => {
                console.error('Gagal menyalin nomor rekening:', error);
            });
        } else {
            console.error('Nomor rekening tidak ditemukan.');
        }
    });
});




