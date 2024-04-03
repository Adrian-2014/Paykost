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
        Schema::create('kamar_kost', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_kamar');
            $table->string('ukuran_kamar');
            $table->string('gambar_kamar');
            $table->string('harga_kamar');
            $table->string('status');
            $table->string('fasilitas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamar_kost');
    }
};