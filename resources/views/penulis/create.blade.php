<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
            {{ __('Tambah Penulis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl rounded-lg dark:bg-gray-800">
                <div class="p-8">
                    <form action="{{ route('penulis.store') }}" method="POST">
                        @csrf

                        <div class="space-y-6">
                            <div>
                                <label for="nama" class="text-sm font-semibold text-gray-700 dark:text-gray-300">Nama
                                    Penulis</label>
                                <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                                    class="block w-full px-4 py-2 mt-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600 dark:focus:ring-indigo-500"
                                    required placeholder="Masukkan nama penulis">
                                @error('nama')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6 flex justify-between items-center">
                            <button type="submit"
                                class="px-6 py-3 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md transition duration-300">
                                Simpan
                            </button>
                            <a href="{{ route('penulis.index') }}"
                                class="text-sm text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
