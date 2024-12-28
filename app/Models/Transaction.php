<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['users_id', 'total', 'transaction_date', 'tema_diskon'];

    public function diskon()
    {
        return $this->belongsTo(Diskon::class, 'tema_diskon', 'tema_diskon');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id'); // pastikan kolom foreign key adalah 'user_id'
    }

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'transaction_product')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
