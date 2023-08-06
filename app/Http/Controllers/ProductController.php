<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Product;
use App\Models\Satuan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        // Mendapatkan data produk beserta kategori terkait
        $products = Product::with(['kategori'])->get();

        // Mengirimkan data ke halaman index
        return view('Product.product', compact('products'));
    }

    function view()
    {
        $kategori = Kategori::get();
        $satuan = Satuan::get();

        return view('Product.add-product', ['kategori' => $kategori, 'satuan' => $satuan]);
    }

    function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required|max:255',
            'satuan' => 'required',
            'kategori' => 'required',
            'harga_pokok' => 'required',
            'harga_jual' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1048', // Ubah sesuai kebutuhan
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Jika validasi berhasil, lanjutkan menyimpan gambar
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('post-image');

            // Simpan path gambar ke database (Contoh)
            $data = [
                'nama_barang' => $request->nama_barang,
                'id_satuan' => $request->satuan,
                'id_kategori' => $request->kategori,
                'harga_pokok' => $request->harga_pokok,
                'harga_jual' => $request->harga_jual,
                'stock_barang' => $request->stock_barang,
                'stock_minimal' => 10,
                'image' => $path
            ];
            Product::create($data);

            // Tambahkan pesan sukses atau redirect ke halaman yang sesuai
            return redirect()->to('/product')->with('success', 'Product berhasil ditambahkan.');
        }
    }

    public function edit($id)
    {
        $data = Product::findOrFail($id);
        $satuan = Satuan::get();
        $kategori = Kategori::get();

        return view('Product.edit-product', ['data' => $data, 'satuan' => $satuan, 'kategori' => $kategori]);
    }

    function update($id, Request $request)
    {
        $data = Product::findOrFail($id);

        $data->nama_barang = $request->get('nama_barang');
        $data->id_satuan = $request->get('satuan');
        $data->id_kategori = $request->get('kategori');
        $data->harga_pokok = $request->get('harga_pokok');
        $data->harga_jual = $request->get('harga_jual');
        $data->stock_barang = $request->get('stock_barang');

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-image');
        }
        $data->save();

        return redirect()->to('/product')->with('success', 'Product Berhasil di update');
    }

    public function destroy($id)
    {
        Product::where('id', $id)->delete();

        return redirect()->to('/product')->with('success', 'Product Berhasil di hapus');
    }

    function lihat()
    {
        $kategori = Kategori::get();

        return view('Product.add-kategori', compact('kategori'));
    }

    function tambahkategori(Request $request)
    {
        $data = [
            // 'id'=> 
            'nama_kategori' => $request->nama_kategori,
        ];

        Kategori::create($data);

        return redirect()->to('/kategori')->with('success', 'Kategori Product berhasil ditambahkan.');
    }
}
