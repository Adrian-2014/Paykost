<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporanKehilangan extends Model
{
    use HasFactory;
    protected $table = 'laporan_kehilangans';

    protected $casts = [
        'waktu_kehilangan' => 'date:Y-m-d H:i',
        'created_at' => 'date:Y-m-d H:i:s',
        'updated_at' => 'date:Y-m-d H:i:s',
    ];
}
