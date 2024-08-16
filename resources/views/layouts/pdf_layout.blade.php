<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Surat/Laporan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
        }

        .kop-surat {
            font-family: "Times New Roman", Times, serif;
            text-align: center;
        }

        .kop-surat h3,
        .kop-surat h2,
        .kop-surat p {
            margin: 0;
        }

        .table-container {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        .table-container th,
        .table-container td {
            border: 1px solid black;
            padding: 8px 12px;
            text-align: left;
        }

        .table-container th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <div class="container mt-4">
        <table class="table table-borderless">
            <tr>
                <td class="align-middle" width="20%" align="center"><img src="logo-smk.png" width="70%"></td>
                <td class="kop-surat align-middle" width="90%">
                    <h3>LEMBAGA PERPUSTAKAAN</h3>
                    <h2>SMK DIGITAL SISTEM INFORMATIKA</h2>
                    <p style="font-size: 14px">Alamat: Jl. Tujuh belas Agustus No.17, Kota Jakarta Pusat, Jakarta</p>
                    <p style="font-size: 14px">Email: smkdigitalinformatika@ac.id</p>
                </td>
                <td class="align-middle" width="20%" align="center"><img src="tut-wuri.png" width="70%"></td>
            </tr>
        </table>
        <hr>
        @yield('content')
    </div>

</body>

</html>
