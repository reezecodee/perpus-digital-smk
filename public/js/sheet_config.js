document.getElementById('fileUpload').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (!file) return; // Jika tidak ada file, keluar dari fungsi
    
    const reader = new FileReader();
    
    reader.onload = function(e) {
        try {
            const data = new Uint8Array(e.target.result);
            const workbook = XLSX.read(data, { type: 'array' });
            const firstSheet = workbook.Sheets[workbook.SheetNames[0]];
            const jsonData = XLSX.utils.sheet_to_json(firstSheet, { header: 1 });

            const tableHeader = document.getElementById('tableHeader');
            const tableBody = document.getElementById('tableBody');
            
            tableHeader.innerHTML = '';
            tableBody.innerHTML = '';

            // Tambahkan header tabel
            const headerRow = jsonData[0];
            headerRow.forEach(header => {
                const th = document.createElement('th');
                th.textContent = header;
                tableHeader.appendChild(th);
            });

            // Tambahkan kolom Actions
            const actionHeader = document.createElement('th');
            actionHeader.textContent = 'Actions';
            tableHeader.appendChild(actionHeader);

            // Tambahkan baris data
            for (let i = 1; i < jsonData.length; i++) {
                const row = document.createElement('tr');
                jsonData[i].forEach(cell => {
                    const td = document.createElement('td');
                    const input = document.createElement('input');
                    input.type = 'text';
                    input.value = cell;
                    input.classList.add('form-control');
                    td.appendChild(input);
                    row.appendChild(td);
                });

                // Tambahkan tombol hapus
                const actionTd = document.createElement('td');
                const deleteBtn = document.createElement('button');
                deleteBtn.textContent = 'Delete';
                deleteBtn.classList.add('btn', 'btn-danger');
                deleteBtn.onclick = function() {
                    row.remove();
                    checkIfTableIsEmpty();
                };
                actionTd.appendChild(deleteBtn);
                row.appendChild(actionTd);
                tableBody.appendChild(row);
            }
        } catch (error) {
            console.error('Error reading file:', error);
            alert('Error processing the file.');
        }
    };

    reader.readAsArrayBuffer(file);
});

function checkIfTableIsEmpty() {
    const tableBody = document.getElementById('tableBody');
    if (tableBody.rows.length === 0) {
        console.log('Table is empty');
    }
}

document.getElementById('submitData').addEventListener('click', function() {
    const table = document.getElementById('excelTable');
    const data = [];

    const headers = [];
    table.querySelectorAll('thead th').forEach(th => {
        headers.push(th.textContent);
    });

    table.querySelectorAll('tbody tr').forEach(tr => {
        const row = {};
        tr.querySelectorAll('td input').forEach((td, index) => {
            row[headers[index]] = td.value;
        });
        data.push(row);
    });

    if (data.length === 0) { // Periksa jika data kosong
        console.log('Data array is empty');
        alert('No data to submit.');
    } else {
        // const url = document.querySelector('meta[name="url"]').getAttribute('content');

        fetch('', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: JSON.stringify({ data: data })
        })
        .then(response => response.json())
        .then(result => {
            console.log(result);
            alert('Data has been uploaded successfully!');
        })
        .catch(error => {
            console.error('Error:', error);
            alert('There was an error uploading the data.');
        });
    }
});
