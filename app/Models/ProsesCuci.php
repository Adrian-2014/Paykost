<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProsesCuci extends Model
{
    use HasFactory;
    protected $table = 'proses_cuci';
    // protected $casts = [

    //     'tgl_start' => 'date:d/m/Y, H:i:s',
    //     'tgl_done' => 'date:d/m/Y, H:i:s'

    // ];
}
