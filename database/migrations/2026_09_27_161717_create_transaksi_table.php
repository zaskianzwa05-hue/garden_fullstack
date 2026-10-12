<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->decimal('total', 12, 2);
            $table->text('alamat');
            $table->string('no_hp', 20);
            $table->enum('status', [
                'Menunggu',
                'Diproses',
                'Dikirim',
                'Selesai',
                'Dibatalkan'
            ])->default('Menunggu');

            $table->timestamp('tanggal')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};