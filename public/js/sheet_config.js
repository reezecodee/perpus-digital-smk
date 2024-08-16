document.getElementById('fileInput').addEventListener('change', handleFileSelect, false);

function handleFileSelect(event) {
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const data = new Uint8Array(e.target.result);
            const workbook = XLSX.read(data, { type: 'array' });

            const firstSheet = workbook.Sheets[workbook.SheetNames[0]];
            const excelData = XLSX.utils.sheet_to_json(firstSheet, { header: 1 });

            displayEditableExcelData(excelData);
        };
        reader.readAsArrayBuffer(file);
    }
}

function deleteRow(rowIndex) {
    const row = document.getElementById(`row-${rowIndex}`);
    if (row) {
        row.remove();  // Menghapus baris dari tabel
    }
}


function displayEditableExcelData(data) {
    let table = '<div style="overflow-x: auto; white-space: nowrap;">';
    table += '<table class="table table-bordered table-striped" style="min-width: 100%;">';
    
    data.forEach(function (row, rowIndex) {
        if (rowIndex === 0) {
            table += '<thead><tr>';
            row.forEach(function (cell) {
                table += `<th>${cell}</th>`;
            });
            table += '<th>Actions</th>';  // Tambahkan kolom aksi untuk header
            table += '</tr></thead><tbody>';
        } else {
            table += `<tr id="row-${rowIndex}">`; // Tambahkan ID unik untuk setiap baris
            row.forEach(function (cell, colIndex) {
                table += `<td><input type="text" class="form-control" value="${cell}" name="cell-${rowIndex}-${colIndex}"></td>`;
            });
            table += `<td><button type="button" class="btn btn-danger btn-sm" onclick="deleteRow(${rowIndex})">Delete</button></td>`;
            table += '</tr>';
        }
    });

    table += '</tbody></table></div>';

    document.getElementById('excelPreview').innerHTML = table;
}


document.getElementById('uploadForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData();
    const inputElements = document.querySelectorAll('input[type="text"]');

    inputElements.forEach(function (input) {
        formData.append(input.name, input.value);
    });

    fetch('', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        alert('Data berhasil dikirim: ' + JSON.stringify(data));
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
