<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporanKerusakan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'laporan_kerusakans';

    protected $casts = [
        'tanggal_rusak' => 'date:Y-m-d',
        'created_at' => 'date:Y-m-d H:i:s',
        'updated_at' => 'date:Y-m-d H:i:s',
    ];

    public function gambarKerusakan() {
        return $this->hasMany(gambarKerusakan::class,'laporan_id', 'id');
    }

}
