<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();

            $table->foreignId('transaksi_id')
                ->unique()
                ->constrained('transaksi')
                ->onDelete('cascade');

            $table->string('metode', 50);
            $table->decimal('jumlah', 12, 2);
            $table->enum('status', [
                'Menunggu',
                'Berhasil',
                'Gagal'
            ])->default('Menunggu');

            $table->timestamp('tanggal')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};