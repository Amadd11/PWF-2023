<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Pendaftaran</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        h1,
        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Data Peminjaman Buku</h1>

    <table>
        <tr>
            <th>Nama</th>
            <td>{{ $member->nama }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $member->email }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $member->tanggal_lahir }}</td>
        </tr>
        <tr>
            <th>No. Telp</th>
            <td>{{ $member->no_hp }}</td>
        </tr>
        <tr>
            <th>Agama</th>
            <td>{{ $member->agama ? $member->agama->nama : 'Tidak ada data agama' }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $member->alamat }}</td>
        </tr>
    </table>
</body>

</html>
