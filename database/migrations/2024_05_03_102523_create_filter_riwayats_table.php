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
        Schema::create('filter_riwayats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembayaran_kost_id')->nullable();
            $table->foreignId('pindah_kamar_id')->nullable();
            $table->foreignId('kerusakan_id')->nullable();
            $table->foreignId('kehilangan_id')->nullable();
            $table->foreignId('ganti_akun_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('nama')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filter_riwayats');
    }
};
