<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .table-pesanan {
            width: 100%;
            border-collapse: collapse;
        }

        .table-pesanan th, .table-pesanan td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .table-pesanan th {
            background-color: #f2f2f2;
            
        }

        .table-pesanan td {
            text-align: center;
            font-size: 13px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h1>Daftar Jenis Paket</h1>
        </div>

        <table class="table-pesanan" >
            <thead>
                <tr>
                  <th>Paket</th>
                  <th>Pengerjaan</th>
                  <th>Potongan</th>
                  <th>Tambahan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jenis_pakets as $paket)
                    <tr>
                        <td>{{ $paket->nama_jenis}}</td>
                        <td>{{ $paket->waktu_pengerjaan }}</td>
                        <td>{{ $paket->potongan_harga }}</td>
                        <td>{{ $paket->biaya_tambahan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
