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
        Schema::create('pembayaran_kosts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_id');
            $table->string('no_kamar');
            $table->string('bulan_tagihan');
            $table->string('total_tagihan');
            $table->string('bank_id');
            $table->string('bukti');

            $table->string('id_pembayaran');
            $table->string('tagihan_selanjutnya');
            $table->string('tanggal_masuk');
            $table->string('durasi_ngekost');
            $table->string('status');
            $table->string('pesan', 1500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_kosts');
    }
};
