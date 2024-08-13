document.getElementById('fileUpload').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        const data = new Uint8Array(e.target.result);
        const workbook = XLSX.read(data, { type: 'array' });

        const firstSheet = workbook.Sheets[workbook.SheetNames[0]];
        const jsonData = XLSX.utils.sheet_to_json(firstSheet, { header: 1 });

        document.getElementById('tableHeader').innerHTML = '';
        document.getElementById('tableBody').innerHTML = '';

        const headerRow = jsonData[0];
        headerRow.forEach(header => {
            const th = document.createElement('th');
            th.textContent = header;
            document.getElementById('tableHeader').appendChild(th);
        });

        const th = document.createElement('th');
        th.textContent = 'Actions';
        document.getElementById('tableHeader').appendChild(th);

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
            document.getElementById('tableBody').appendChild(row);
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
    for (let th of table.querySelectorAll('thead th')) {
        headers.push(th.textContent);
    }
    data.push(headers.slice(0, -1));

    for (let tr of table.querySelectorAll('tbody tr')) {
        const row = [];
        for (let td of tr.querySelectorAll('td input')) {
            row.push(td.value);
        }
        data.push(row);
    }

    if (data.length === 1) {
        console.log('Data array is empty');
    } else {
        // let url = document.querySelector('meta[name="url"]').getAttribute('content')
        // console.log(url);
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