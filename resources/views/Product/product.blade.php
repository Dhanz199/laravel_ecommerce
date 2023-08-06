<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Product') }}
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

    <div class="container mx-auto mt-10">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Gambar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Barang
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Satuan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kategori
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga Pokok
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga Jual
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Stock Barang
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                @if ($product->image)
                                    <img class="rounded-lg responsive w-10"
                                        src="{{ asset('storage/' . $product->image) }}" alt="Product" />
                                @else
                                    <img class="rounded-lg" src="img/latte.png" alt="product image" />
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->nama_barang }}
                            </td>
                            <td class="px-6 py-4">
                                @foreach ($product->satuan as $satuans)
                                    {{ $satuans->nama_satuan }}
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                @foreach ($product->kategori as $kategoris)
                                    {{ $kategoris->nama_kategori }}
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->harga_pokok }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->harga_jual }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->stock_barang }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap">

                                    {{-- Show --}}
                                    <a href="#"
                                        class="me-3 font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            id="eye" viewBox="0 0 48 48">
                                            <path fill="none" d="M0 0h48v48H0z"></path>
                                            <path
                                                d="M24 9C14 9 5.46 15.22 2 24c3.46 8.78 12 15 22 15 10.01 0 18.54-6.22 22-15-3.46-8.78-11.99-15-22-15zm0 25c-5.52 0-10-4.48-10-10s4.48-10 10-10 10 4.48 10 10-4.48 10-10 10zm0-16c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6z">
                                            </path>
                                        </svg>
                                    </a>

                                    {{-- Edit --}}
                                    <a href="{{ route('edit', $product->id) }}"
                                        class="me-3 font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                            width="22" height="22" viewBox="0 0 48 48">
                                            <path fill="#E57373"
                                                d="M42.583,9.067l-3.651-3.65c-0.555-0.556-1.459-0.556-2.015,0l-1.718,1.72l5.664,5.664l1.72-1.718C43.139,10.526,43.139,9.625,42.583,9.067">
                                            </path>
                                            <path fill="#FF9800" d="M4.465 21.524H40.471999999999994V29.535H4.465z"
                                                transform="rotate(134.999 22.469 25.53)"></path>
                                            <path fill="#B0BEC5" d="M34.61 7.379H38.616V15.392H34.61z"
                                                transform="rotate(-45.02 36.61 11.385)"></path>
                                            <path fill="#FFC107" d="M6.905 35.43L5 43 12.571 41.094z"></path>
                                            <path fill="#37474F" d="M5.965 39.172L5 43 8.827 42.035z"></path>
                                        </svg>
                                    </a>

                                    {{-- Delete --}}
                                    <a href="{{ route('delete', $product->id) }}"
                                        class="font-medium text-red-600 dark:text-white-500 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                            width="22" height="22" viewBox="0 0 48 48">
                                            <path fill="#9575CD"
                                                d="M34,12l-6-6h-8l-6,6h-3v28c0,2.2,1.8,4,4,4h18c2.2,0,4-1.8,4-4V12H34z">
                                            </path>
                                            <path fill="#7454B3"
                                                d="M24.5 39h-1c-.8 0-1.5-.7-1.5-1.5v-19c0-.8.7-1.5 1.5-1.5h1c.8 0 1.5.7 1.5 1.5v19C26 38.3 25.3 39 24.5 39zM31.5 39L31.5 39c-.8 0-1.5-.7-1.5-1.5v-19c0-.8.7-1.5 1.5-1.5l0 0c.8 0 1.5.7 1.5 1.5v19C33 38.3 32.3 39 31.5 39zM16.5 39L16.5 39c-.8 0-1.5-.7-1.5-1.5v-19c0-.8.7-1.5 1.5-1.5l0 0c.8 0 1.5.7 1.5 1.5v19C18 38.3 17.3 39 16.5 39z">
                                            </path>
                                            <path fill="#B39DDB"
                                                d="M11,8h26c1.1,0,2,0.9,2,2v2H9v-2C9,8.9,9.9,8,11,8z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
