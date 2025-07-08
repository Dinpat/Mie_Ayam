<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan'; // ini yang penting!
    protected $primaryKey = 'id_user';
    public $timestamps = false;

    protected $fillable = ['nama', 'nim_nip', 'password', 'role'];
}
