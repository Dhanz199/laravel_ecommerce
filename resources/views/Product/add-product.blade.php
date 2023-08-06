<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Product') }}
        </h2>
    </x-slot>

    @if ($message = Session::get('success'))
        <div id="toast-bottom-right"
            class=" fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg shadow right-5 bottom-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="duration-50 ml-3 text-sm font-normal">
                <strong>{{ $message }}</strong>
            </div>
            <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                data-dismiss-target="#toast-bottom-right" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif

    <div class="container mx-auto mt-5">
        <div class="grid grid-rows-3 grid-flow-col gap-4">
            <div class="row-span-3">
                <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="flex items-center justify-center w-full">
                        <figure class="h-auto max-w-md">
                            <img class="rounded-lg img-preview">
                        </figure>
                    </div>
            </div>

            {{-- Nama Barang --}}
            <div class="col-span-2">
                <div>
                    <label for="nama_barang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('nama_barang') is-invalid @enderror"
                        value="{{ old('nama_barang') }}">
                    @error('nama_barang')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            {{-- Satuan --}}
            <div class="col-span-2">
                <div>
                    <label for="satuan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satuan</label>
                    <select id="satuan" name="satuan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('satuan') is-invalid @enderror">
                        @foreach ($satuan as $item)
                            @if (old('satuan') == $item->id)
                                <option value="{{ $item->id }}" selected> {{ $item->nama_satuan }}</option>
                            @else
                                <option value="{{ $item->id }}"> {{ $item->nama_satuan }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Kategori --}}
            <div class="col-span-2">
                <div>
                    <label for="kategori"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                    <select id="kategori" name="kategori"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('kategori') is-invalid @enderror">
                        @foreach ($kategori as $value)
                            @if (old('kategori') == $value->id)
                                <option value="{{ $value->id }}" selected> {{ $value->nama_kategori }}</option>
                            @else
                                <option value="{{ $value->id }}"> {{ $value->nama_kategori }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Harga Pokok --}}
            <div class="col-span-2">
                <div>
                    <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                        Pokok
                    </label>
                    <input type="number" name="harga_pokok" id="harga"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('harga_pokok') is-invalid @enderror"
                        value="{{ old('harga_pokok') }}">
                </div>
                @error('harga_pokok')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Harga Jual --}}
            <div class="col-span-2">
                <div>
                    <label for="harga_jual" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                        Jual
                    </label>
                    <input type="number" name="harga_jual" id="harga_jual"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('harga_jual') is-invalid @enderror"
                        value="{{ old('harga_jual') }}">
                </div>
                @error('harga_jual')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Stock Barang --}}
            <div class="col-span-2">
                <div>
                    <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock
                    </label>
                    <input type="number" name="stock_barang" id="stock"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('harga_jual') is-invalid @enderror"
                        value="{{ old('stock_barang') }}">
                </div>
                @error('harga_jual')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>

        {{-- Gambar --}}
        <div class="grid justify-items-start">
            <div class="justify-self-stretch mt-5">
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('image') is-invalid @enderror"
                    id="image" type="file" name="image" onchange="previewImage()">
            </div>
        </div>
        @error('image')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                {{ $message }}
            </p>
        @enderror

        <div class="flex justify-end mt-8">
            <button type="submit"
                class="w-80 text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Add</button>
        </div>

        </form>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector("#image");
            const imgPreview = document.querySelector(".img-preview");

            imgPreview.style.display = "flex";

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            };
        }
    </script>
</x-app-layout>
