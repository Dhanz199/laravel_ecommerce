<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    function index()
    {
        $satuan = Satuan::get();

        return view('Product.add-satuan', compact('satuan'));
    }

    function tambahsatuan(Request $request)
    {
        $data = [
            'nama_satuan' => $request->nama_satuan,
        ];

        Satuan::create($data);

        return redirect()->to('/satuan')->with('success', 'Sataun Product berhasil ditambahkan.');
    }
}
