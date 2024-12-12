<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Paket Laundry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .text-center {
            text-align: center;
        }
        .header-info {
            text-align: left;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <h1>Laporan Paket Laundry</h1>
    
    <div class="header-info">
        <p><strong>Tanggal:</strong> {{ date('d-m-Y') }}</p>
    </div>

    @foreach ($jenis_paket as $jenis)
        <h2>Jenis Paket: {{ $jenis->nama_jenis }}</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama Paket</th>
                    <th>Harga Standar</th>
                    <th>Jenis</th>
                    <th>Total Harga</th>
                    <th>Tipe</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jenis->paket as $pakets)
                <tr>
                    <td>{{ $pakets->nama_paket }}</td>
                    <td>{{ number_format($pakets->harga_paket, 0, ',', '.') }}</td>
                    <td>{{ $pakets->jenispaket->nama_jenis }}</td>
                    <td>{{ number_format($pakets->total_harga_paket, 0, ',', '.') }}</td>
                    <td>{{ $pakets->tipe }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach

</body>
</html>
