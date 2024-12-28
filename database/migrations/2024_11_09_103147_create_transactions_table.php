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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id(); // Auto-increment ID (BIGINT UNSIGNED)
            $table->foreignId('users_id') // Foreign key ke tabel pengguna
                  ->constrained('users', 'id')
                  ->onDelete('cascade');
            $table->decimal('total', 10, 2);
            $table->timestamp('transaction_date');
            $table->string('tema_diskon')->nullable();

            // Relasi ke tabel diskon
            $table->foreign('tema_diskon')
                  ->references('tema_diskon')
                  ->on('diskon')
                  ->onDelete('set null'); // Diskon bisa dihapus tanpa memengaruhi transaksi
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

