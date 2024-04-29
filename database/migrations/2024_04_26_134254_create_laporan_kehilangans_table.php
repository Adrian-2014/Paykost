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
        Schema::create('laporan_kehilangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('user_id');
            $table->string('no_kamar');
            $table->string('barang_hilang');
            $table->string('waktu_kehilangan');
            $table->string('status');
            $table->string('keterangan');
            $table->string('respon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_kehilangans');
    }
};