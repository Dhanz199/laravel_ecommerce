<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Product') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-5">
        <div class="grid grid-rows-3 grid-flow-col gap-4">
            <div class="row-span-3">
                <form action="{{ route('edit', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="oldImage" value="{{ $data->image }}">
                    @if ($data->image)
                        <div class="max-w-xl">
                            <img class="rounded-xl" src="{{ asset('storage/' . $data->image) }}" alt="image description">
                        </div>
                    @else
                        <img class="h-auto max-w-full" src="{{ $data->image }}" alt="image description">
                    @endif
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>

            <div class="col-span-2">
                <div>
                    <label for="nama_barang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('nama_barang') is-invalid @enderror"
                        value="{{ $data->nama_barang }}">
                    @error('nama_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="col-span-2">
                <div>
                    <label for="satuan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satuan</label>
                    <select id="satuan" name="satuan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('satuan') is-invalid @enderror">
                        @foreach ($satuan as $satuans)
                            <option selected value="{{ $satuans->id }}">{{ $satuans->nama_satuan ?? '' }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="col-span-2">
                <div>
                    <label for="kategori"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                    <select id="kategori" name="kategori"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('kategori') is-invalid @enderror">
                        @foreach ($kategori as $kategoris)
                            <option selected value="{{ $kategoris->id }}">{{ $kategoris->nama_kategori ?? '' }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-span-2">
                <div>
                    <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                        Pokok
                    </label>
                    <input type="number" name="harga_pokok" id="harga"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('harga_pokok') is-invalid @enderror"
                        value="{{ $data->harga_pokok ?? '' }}">
                </div>
                @error('harga_pokok')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-span-2">
                <div>
                    <label for="harga_jual" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                        Jual
                    </label>
                    <input type="number" name="harga_jual" id="harga_jual"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('harga_jual') is-invalid @enderror"
                        value="{{ $data->harga_jual ?? '' }}">
                </div>
                @error('harga_jual')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-span-2">
                <div>
                    <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock
                    </label>
                    <input type="number" name="stock_barang" id="stock"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('harga_jual') is-invalid @enderror"
                        value="{{ $data->stock_barang }}">
                </div>
                @error('harga_jual')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="grid justify-items-start">
            <div class="justify-self-stretch mt-5">
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="image" type="file" name="image" onchange="previewImage()">
            </div>
            @error('image')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>

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
