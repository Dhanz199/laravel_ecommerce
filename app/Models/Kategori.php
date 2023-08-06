<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    public $table = 'kategori';
    public $primaryKey = 'id';
    public $fillable = ['nama_kategori'];

    function product()
    {
        return $this->hasMany(Product::class, 'kategori', 'id_kategori', 'id');
    }
}
