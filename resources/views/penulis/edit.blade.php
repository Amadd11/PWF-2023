<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Penulis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-xl text-gray-900 dark:text-gray-100">
                    <form action="{{ route('penulis.update', $penulis->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="nama"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama
                                    Penulis</label>
                                <input type="text" id="nama" name="nama"
                                    value="{{ old('nama', $penulis->nama) }}"
                                    class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600 dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                                    required>
                                @error('nama')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="px-6 py-2 text-white bg-indigo-600 rounded-md">
                                Update
                            </button>
                            <a href="{{ route('penulis.index') }}"
                                class="ml-3 text-gray-600 dark:text-gray-400 hover:underline">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
