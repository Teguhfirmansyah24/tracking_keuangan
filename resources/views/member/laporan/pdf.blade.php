<!DOCTYPE html>
<html>

<head>
    <title>Laporan Keuangan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2 f2 f2;
        }

        .pemasukan {
            color: green;
        }

        .pengeluaran {
            color: red;
        }
    </style>
</head>

<body>
    <h2>Laporan Keuangan Periode {{ $bulan }}/{{ $tahun }}</h2>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Akun</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $trx)
                <tr>
                    <td>{{ $trx->tanggal }}</td>
                    <td>{{ $trx->kategori->nama }}</td>
                    <td>{{ $trx->akun->nama_akun }}</td>
                    <td class="{{ $trx->kategori->tipe }}">
                        Rp {{ number_format($trx->jumlah, 0, ',', '.') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
