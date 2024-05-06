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
        Schema::create('pindah_kamars', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('user_id');
            $table->string('tanggal_masuk');
            $table->string('durasi_ngekost');
            $table->string('kamar_lama');
            $table->string('harga_lama');
            $table->string('kamar_baru');
            $table->string('harga_baru');
            $table->string('ukuran_baru');
            $table->string('waktu_pindah');
            $table->string('status');
            $table->string('alasan', 1500)->nullable();
            $table->string('respon', 1500)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pindah_kamars');
    }
};
