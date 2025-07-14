<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';              

    protected $fillable = [
        'user_id',
        'status_pesanan',
        'lokasi_pesanan',
        'bukti_pembayaran',
        'status_pembayaran',
        'total_bayar',
    ];
}

