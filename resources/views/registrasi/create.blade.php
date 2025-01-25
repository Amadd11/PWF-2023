<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Registrasi Peminjaman Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <h1 class="text-lg font-bold text-gray-800 dark:text-gray-100">Registrasi Peminjaman Buku</h1>

                    @if ($errors->any())
                        <div class="mt-4 text-sm text-red-600 dark:text-red-400">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('registrasi.store') }}" class="mt-6 space-y-4">
                        @csrf

                        <!-- Nama -->
                        <div class="form-group">
                            <label for="nama"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                            <input type="text" id="nama" name="nama"
                                class="w-full p-2 border border-gray-300 rounded-md shadow-sm form-control focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="Masukkan nama lengkap" required>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" id="email" name="email"
                                class="w-full p-2 border border-gray-300 rounded-md shadow-sm form-control focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="Masukkan email valid" required>
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="form-group">
                            <label for="tanggal_lahir"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                class="w-full p-2 border border-gray-300 rounded-md shadow-sm form-control focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                required>
                        </div>

                        <!-- Nomor Telp -->
                        <div class="form-group">
                            <label for="no_hp"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor Telp</label>
                            <input type="text" id="no_hp" name="no_hp"
                                class="w-full p-2 border border-gray-300 rounded-md shadow-sm form-control focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="Masukkan nomor telepon" required>
                        </div>

                        <!-- Agama -->
                        <div class="form-group">
                            <label for="agama"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Agama</label>
                            <select id="agama" name="agama"
                                class="w-full p-2 border border-gray-300 rounded-md shadow-sm form-control focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                required>
                                <option value="" disabled selected>Pilih agama</option>
                                @foreach ($agama as $d)
                                    <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Alamat -->
                        <div class="form-group">
                            <label for="alamat"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat</label>
                            <textarea id="alamat" name="alamat" rows="4"
                                class="w-full p-2 border border-gray-300 rounded-md shadow-sm form-control focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="Masukkan alamat lengkap" required></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex mt-6 space-x-4">
                            <button type="submit"
                                class="px-4 py-2 text-white bg-blue-500 rounded-md btn btn-primary hover:bg-blue-600">Daftar</button>
                            <a href="{{ route('registrasi.index') }}"
                                class="px-4 py-2 text-white bg-gray-500 rounded-md btn btn-secondary hover:bg-gray-600">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
