<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filterRiwayat extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'filter_riwayats';

    public function pembayaranKost()
    {
        return $this->belongsTo(PembayaranKost::class, 'pembayaran_kost_id');
    }

    public function pindahKamar()
    {
        return $this->belongsTo(PindahKamar::class, 'pindah_kamar_id');
    }

    public function kerusakan()
    {
        return $this->belongsTo(laporanKerusakan::class, 'kerusakan_id');
    }

    public function kehilangan()
    {
        return $this->belongsTo(laporanKehilangan::class, 'kehilangan_id');
    }
    public function gantiAkun()
    {
        return $this->belongsTo(gantiAkun::class, 'ganti_akun_id');
    }
}
