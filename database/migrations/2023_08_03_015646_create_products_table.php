<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->foreignId('id_satuan')->constrained(
                table: 'satuan',
                indexName: 'id_satuan'
            );
            $table->foreignId('id_kategori')->constrained(
                table: 'kategori',
                indexName: 'id_kategori'
            );
            $table->double('harga_pokok');
            $table->double('harga_jual');
            $table->double('stock_barang');
            $table->double('stock_minimal');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
