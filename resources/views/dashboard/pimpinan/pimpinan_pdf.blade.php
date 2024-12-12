<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pesanan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Laporan Pesanan</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pemasukan</th>
                <th>Pelanggan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanans as $pesanan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pesanan->created_at->format('Y-m-d') }}</td>
                    <td>Rp. {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                    <td>{{ $pesanan->user->name }}</td>
                    <td>{{ $pesanan->status_pesanan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
