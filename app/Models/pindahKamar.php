<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pindahKamar extends Model
{
    use HasFactory;
    protected $casts =  [
        'waktu_pindah' => 'date:Y-m-d H:i',
        'created_at' => 'date:Y-m-d H:i:s'
    ];
}
