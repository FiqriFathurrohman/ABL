<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    /**
     * Field yang diizinkan untuk diisi secara massal.
     * Sesuai dengan rancangan: 4% Admin, 6% Kas, 90% Petani.
     */
    protected $fillable = [
    'user_id',
    'trx_id',
    'total_amount',
    'fee_admin',
    'dana_kas',
    'status',
];

    /**
     * Casting data agar angka desimal (decimal) di database 
     * dibaca sebagai 'float' atau 'double' di PHP supaya bisa dihitung.
     */
    protected $casts = [
        'total_harga' => 'float',
        'fee_admin' => 'float',
        'dana_kas' => 'float',
        'netto_petani' => 'float',
    ];

    /**
     * Relasi: Transaksi ini milik seorang Petani (User).
     * Dengan ini kamu bisa memanggil $transaction->petani->name
     */
    public function petani(): BelongsTo
    {
        return $this->belongsTo(User::class, 'petani_id');
    }
}