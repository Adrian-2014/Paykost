<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cucisize', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('harga_barang');
            $table->string('gambar_barang');
            $table->string('status');
            $table->string('jenis_layanan');
            $table->string('ukuran_barang');
            $table->string('detail_ukuran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cucisize');
    }
};
