<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi Peminjaman Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-lg p-8 bg-white rounded-lg shadow-lg">

            <h1 class="mb-6 text-3xl font-semibold text-center text-gray-800">Registrasi Peminjaman Buku</h1>

            <!-- Error Message -->
            @if ($errors->any())
                <div class="p-4 mb-4 text-white bg-red-500 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('registrasi.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Nama -->
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="nama"
                        class="block w-full px-4 py-2 mt-1 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                        name="nama" placeholder="Masukkan nama lengkap" required>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email"
                        class="block w-full px-4 py-2 mt-1 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                        name="email" placeholder="Masukkan email valid" required>
                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-4">
                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir"
                        class="block w-full px-4 py-2 mt-1 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                        name="tanggal_lahir" required>
                </div>

                <!-- Nomor Telp -->
                <div class="mb-4">
                    <label for="no_hp" class="block text-sm font-medium text-gray-700">Nomor Telp</label>
                    <input type="text" id="no_hp"
                        class="block w-full px-4 py-2 mt-1 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                        name="no_hp" placeholder="Masukkan nomor telepon" required>
                </div>

                <!-- Agama -->
                <div class="mb-4">
                    <label for="agama" class="block text-sm font-medium text-gray-700">Agama</label>
                    <select id="agama" name="agama"
                        class="block w-full px-4 py-2 mt-1 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                        <option value="" disabled selected>Pilih agama</option>
                        @foreach ($agama as $d)
                            <option value="{{ $d->id }}">{{ $d->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Alamat -->
                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea id="alamat" name="alamat" rows="4"
                        class="block w-full px-4 py-2 mt-1 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Masukkan alamat lengkap" required></textarea>
                </div>

                <!-- Submit Button -->
                <div class="mb-4">
                    <button type="submit"
                        class="w-full py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                        Daftar
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
