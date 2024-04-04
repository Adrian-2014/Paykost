<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KamarKostFasilitas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $table = 'kamar_kost_fasilitas';


    public function kamar_kost() {
        return $this->belongsTo(kamarKost::class,'kamar_kost_id','id');
    }

    public function fasilitas() {
        return $this->belongsTo(fasilitas::class,'fasilitas_id','id');
    }
}
