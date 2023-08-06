<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $table = 'product';
    public $primaryKey = 'id';
    public $fillable = ['id', 'nama_barang', 'id_satuan', 'id_kategori', 'harga_pokok', 'harga_jual', 'stock_barang', 'stock_minimal', 'image'];

    public function kategori()
    {
        return $this->belongsToMany(Kategori::class, 'product', 'id', 'id_kategori');
    }

    function satuan()
    {
        return $this->belongsToMany(Satuan::class, 'product', 'id', 'id_satuan');
    }
}
