<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';              // Nama tabel
    protected $primaryKey = 'id_pesanan';      // Gunakan kolom yang benar sebagai primary key
    public $timestamps = false;                // Karena tidak ada kolom created_at & updated_at

    protected $fillable = [
        'id_user',
        'waktu_pesan',
        'status_pesanan',
        'lokasi_pesanan',
        'pembayaran',
        'bukti_pembayaran',
        'status_pembayaran',
    ];
}

