<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Daftar Registrasi Peminjaman Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-xl text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <x-pinjam-button href="{{ route('registrasi.create') }}" />
                        </div>
                        <div>
                            @if (session('pesan'))
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                                    class="text-sm text-green-600 dark:text-green-400">
                                    {{ session('pesan') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Nama</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                                <th scope="col" class="px-6 py-3">Tanggal Lahir</th>
                                <th scope="col" class="px-6 py-3">Nomor Telp</th>
                                <th scope="col" class="px-6 py-3">Agama</th>
                                <th scope="col" class="px-6 py-3">Buku</th> <!-- Kolom Buku Ditambahkan -->
                                <th scope="col" class="px-6 py-3">Alamat</th>
                                <th scope="col" class="px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registrasi as $data)
                                <tr class="odd:bg-white odd:dark:bg-gray-800 even:bg-gray-50 even:dark:bg-gray-700">
                                    <td class="px-6 py-4">{{ $data->nama }}</td>
                                    <td class="px-6 py-4">{{ $data->email }}</td>
                                    <td class="px-6 py-4">{{ $data->tanggal_lahir }}</td>
                                    <td class="px-6 py-4">{{ $data->no_hp }}</td>
                                    <td class="px-6 py-4">{{ $data->agama->nama ?? 'N/A' }}</td>
                                    <td class="px-6 py-4">{{ $data->buku->judul ?? 'N/A' }}</td>
                                    <!-- Menampilkan Nama Buku -->
                                    <td class="px-6 py-4">{{ $data->alamat }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-3">
                                            <a href="{{ url('/registrasi/cetak/' . $data->id) }}"
                                                class="text-green-600 dark:text-green-400 hover:underline">
                                                Cetak Kartu
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
