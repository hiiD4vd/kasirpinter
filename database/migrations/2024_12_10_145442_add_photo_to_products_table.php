<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhotoToProductsTable extends Migration
{
    /**
     * Menjalankan migration untuk menambahkan kolom 'photo' pada tabel 'products'.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('photo')->nullable(); // Kolom untuk menyimpan foto produk
        });
    }

    /**
     * Membatalkan perubahan yang dilakukan pada method 'up'.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('photo'); // Menghapus kolom 'photo' jika rollback
        });
    }
}
