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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('status_pesanan', ['pending', 'diporses', 'dimasak', 'siap diantar', 'selesai'])->default('pending');
            $table->string('lokasi_pesanan',50);
            $table->enum('status_pembayaran',['belum dibayar', 'sudah dibayar'])->default('belum dibayar');
            $table->string('bukti_pembayaran');
            $table->integer('total_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
