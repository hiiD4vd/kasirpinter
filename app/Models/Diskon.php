<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diskon extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'tema_diskon';
    public $incrementing = false;
    protected $table = 'diskon';
    protected $fillable = ['tema_diskon', 'persentase', 'mulai', 'berakhir'];
    protected $dates = ['deleted_at'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'tema_diskon', 'tema_diskon');
    }
}
