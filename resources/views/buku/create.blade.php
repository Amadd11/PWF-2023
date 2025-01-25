<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Tambah Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <h1 class="text-lg font-bold text-gray-800 dark:text-gray-100">Tambah Buku</h1>

                    @if ($errors->any())
                        <div class="mt-4 text-sm text-red-600 dark:text-red-400">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('buku.store') }}" class="mt-6 space-y-4"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="judul"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul</label>
                            <input type="text" id="judul" name="judul"
                                class="w-full p-2 border border-gray-300 rounded-md shadow-sm form-control focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="id_penulis"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Penulis</label>
                            <select id="id_penulis" name="id_penulis"
                                class="w-full p-2 border border-gray-300 rounded-md shadow-sm form-control focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                required>
                                <option value="" disabled selected>Pilih Penulis</option>
                                @foreach ($penulis as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="published_date"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal
                                Terbit</label>
                            <input type="date" id="published_date" name="published_date"
                                class="w-full p-2 border border-gray-300 rounded-md shadow-sm form-control focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div class="flex mt-6 space-x-4">
                            <button type="submit"
                                class="px-4 py-2 text-white bg-blue-500 rounded-md btn btn-primary hover:bg-blue-600">Simpan</button>
                            <a href="{{ route('buku.index') }}"
                                class="px-4 py-2 text-white bg-gray-500 rounded-md btn btn-secondary hover:bg-gray-600">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
