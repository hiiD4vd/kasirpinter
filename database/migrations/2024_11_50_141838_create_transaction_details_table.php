<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('transaction_id') // Foreign key ke tabel transactions
                  ->constrained('transactions')
                  ->onDelete('cascade');
            $table->foreignId('product_id') // Foreign key ke tabel products
                  ->constrained('products')
                  ->onDelete('restrict');
            
            $table->integer('quantity'); // Jumlah produk
            $table->decimal('price', 10, 2); // Harga satuan produk
            $table->decimal('subtotal', 10, 2); // Subtotal = quantity * price
            $table->timestamps(); // Tanggal dibuat dan diupdate
            $table->softDeletes(); // Kolom soft delete (opsional)
        });
    }

    /**
     * Balik migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};
