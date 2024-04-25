<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proses_cuci', function (Blueprint $table) {
            $table->id();
            $table->string('id_pembelian');
            $table->string('nama_user');
            $table->string('user_id');
            $table->string('jumlah');
            $table->string('bukti');
            $table->string('no_kamar');
            $table->string('jenis_layanan');
            $table->string('total_biaya');
            $table->string('tgl_start');
            $table->string('tgl_done');
            $table->string('status');
            $table->foreignId('bank_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proses_cuci');
    }
};
