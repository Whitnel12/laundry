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
            text-align: left;
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
            <h1>Laporan Pesanan</h1>
        </div>

        <table class="table-pesanan">
            <thead>
                <tr>
                    <th>Pesanan</th>
                    <th>Pelanggan</th>
                    <th>Berat</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanans as $pesanan)
                    <tr>
                        <td>{{ $pesanan->paket->nama_paket }} & {{ $pesanan->paket->jenispaket->nama_jenis }}</td>
                        <td>{{ $pesanan->user->name }}</td>
                        <td>{{ $pesanan->berat }} kg</td>
                        <td>{{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                        <td>{{ $pesanan->status_pesanan }}</td>
                        <td>{{ $pesanan->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
