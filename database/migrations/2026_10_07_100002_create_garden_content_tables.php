<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('wishlist', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('produk_id')->constrained('produk')->cascadeOnDelete();
            $table->unique(['user_id','produk_id']);
            $table->timestamps();
        });
        Schema::create('promo', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 30)->unique();
            $table->string('nama', 100);
            $table->text('deskripsi')->nullable();
            $table->enum('tipe',['persen','nominal'])->default('persen');
            $table->decimal('nilai',12,2);
            $table->decimal('min_belanja',12,2)->default(0);
            $table->date('mulai');
            $table->date('berakhir');
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });
        Schema::create('testimoni', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('nama',100);
            $table->text('isi');
            $table->unsignedTinyInteger('rating')->default(5);
            $table->boolean('tampil')->default(true);
            $table->timestamps();
        });
        Schema::create('blog', function (Blueprint $table) {
            $table->id();
            $table->string('judul',180);
            $table->string('slug',200)->unique();
            $table->text('ringkasan')->nullable();
            $table->longText('isi');
            $table->string('gambar')->nullable();
            $table->boolean('publish')->default(true);
            $table->timestamps();
        });
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id();
            $table->string('nama_metode',60);
            $table->text('deskripsi')->nullable();
            $table->decimal('biaya',12,2)->default(0);
            $table->integer('estimasi_hari')->default(2);
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id')->constrained('transaksi')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->text('alasan');
            $table->enum('status',['Diajukan','Diproses','Disetujui','Ditolak'])->default('Diajukan');
            $table->text('catatan_admin')->nullable();
            $table->timestamps();
        });
        Schema::create('pengaturan', function (Blueprint $table) {
            $table->id();
            $table->string('kunci',100)->unique();
            $table->text('nilai')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('pengaturan');
        Schema::dropIfExists('pengembalian');
        Schema::dropIfExists('pengiriman');
        Schema::dropIfExists('blog');
        Schema::dropIfExists('testimoni');
        Schema::dropIfExists('promo');
        Schema::dropIfExists('wishlist');
    }
};
