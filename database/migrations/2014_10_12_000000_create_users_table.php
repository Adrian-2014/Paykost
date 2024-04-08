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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('profil')->nullable();
            $table->string('tanggal_masuk')->nullable();
            $table->string('no_kamar')->nullable();
            $table->string('durasi_ngekost')->nullable();
            $table->string('no_telpon')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('status_bayar')->nullable();
            $table->string('status')->nullable();

            $table->foreignId('role_id');
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
