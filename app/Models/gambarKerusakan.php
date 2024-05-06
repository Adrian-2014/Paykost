<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gambarKerusakan extends Model
{
    use HasFactory;
    protected $fillable = [
        'laporan_id',
    ];
    protected $table = 'gambar_kerusakans';
}
