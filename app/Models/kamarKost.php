<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class kamarKost extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'kamar_kost';

    public function kamarKostFasilitas() {
        return $this->hasMany(KamarKostFasilitas::class,'kamar_kost_id', 'id');
    }
    public function gambarKamar() {
        return $this->hasMany(gambarKamar::class,'kamar_kost_id', 'id');
    }
}
