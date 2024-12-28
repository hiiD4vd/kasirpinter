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
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('harga_beli', 10, 2)->nullable(); // harga beli
            $table->decimal('harga_jual', 10, 2)->nullable(); // harga jual
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('harga_beli', 10, 2)->nullable(); // harga beli
            $table->decimal('harga_jual', 10, 2)->nullable(); // harga jual
        });
        
    }
};
