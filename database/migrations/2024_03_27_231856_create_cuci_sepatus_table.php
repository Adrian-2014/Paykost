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
        Schema::create('cuci_sepatu', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('harga_barang');
            $table->string('gambar_barang');
            $table->string('status');
            $table->string('jenis_layanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuci_sepatu');
    }
};
