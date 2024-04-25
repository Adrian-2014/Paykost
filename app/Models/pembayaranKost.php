<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaranKost extends Model
{
    use HasFactory;
    protected $table = 'pembayaran_kosts';
    protected $casts = [
        'bulan_tagihan' => 'date:d-m-Y',
        'created_at' => 'date:Y-m-d H:i:s',
    ];
}
