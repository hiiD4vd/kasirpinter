<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('transaction_id')->constrained('transactions')->onDelete('cascade'); // Foreign Key ke tabel transactions
            $table->string('receipt_code')->unique(); // Kode unik untuk resi
            $table->dateTime('printed_at')->nullable(); // Waktu cetak resi
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receipts');
    }
}
