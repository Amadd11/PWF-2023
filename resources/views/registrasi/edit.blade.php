<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Peminjaman Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Data Peminjaman Buku</h1>

        <!-- Form Edit -->
        <form method="POST" action="{{ route('registrasi.update', $pinjam->id) }}">
            @csrf
            @method('PUT')

            <!-- Input Nama -->
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $pinjam->nama }}"
                    required>
            </div>

            <!-- Input Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $pinjam->email }}"
                    required>
            </div>

            <!-- Input Tanggal Lahir -->
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                    value="{{ $pinjam->tanggal_lahir }}" required>
            </div>

            <!-- Input Telp -->
            <div class="form-group">
                <label for="telp">No. Telp</label>
                <input type="text" class="form-control" id="telp" name="telp" value="{{ $pinjam->telp }}"
                    required>
            </div>

            <!-- Input Agama -->
            <div class="form-group">
                <label for="agama">Agama</label>
                <select name="agama" class="form-control" id="agama" required>
                    <option value="">Pilih Agama</option>
                    @foreach ($agama as $ag)
                        <option value="{{ $ag->id }}" {{ $pinjam->id_agama == $ag->id ? 'selected' : '' }}>
                            {{ $ag->agama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Input Alamat -->
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="4" required>{{ $pinjam->alamat }}</textarea
