<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gantiAkun extends Model
{
    use HasFactory;
    protected $table = 'ganti_akuns';
    protected $casts = [
        'updated_at' => 'date:Y-m-d H:i:s',
    ];
}
