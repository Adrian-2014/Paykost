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
        Schema::create('ganti_akuns', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('user_id');
            $table->string('email_old');
            $table->string('password_old');
            $table->string('email_new');
            $table->string('password_new');
            $table->string('status');
            $table->string('alasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ganti_akuns');
    }
};
