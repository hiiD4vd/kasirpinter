<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{


    use HasFactory;

    use SoftDeletes;

    // Kolom yang diizinkan untuk diisi
    // protected $fillable = [
    //     'name',
    //     'price',
    //     // tambahkan kolom lain yang diperlukan
    // ];

    protected $fillable = [
        'name', 
        'stock', 
        'price', 
        'category_id', 
        'supplier_id', 
        'photo', 
        'harga_beli',  // Tambahkan harga_beli
        'harga_jual'   // Tambahkan harga_jual
    ];
    

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function transactions()
{
    return $this->belongsToMany(Transaction::class, 'transaction_product')
                ->withPivot('quantity')
                ->withTimestamps();
}


    // public function purchases()
    // {
    //     return $this->hasMany(Purchase::class); // Sesuaikan dengan struktur tabel Anda
    // }
}
