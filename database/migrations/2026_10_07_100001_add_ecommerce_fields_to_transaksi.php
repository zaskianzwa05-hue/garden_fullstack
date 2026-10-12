<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->string('nama_penerima', 100)->nullable()->after('user_id');
            $table->string('metode_pengiriman', 50)->default('Reguler')->after('no_hp');
            $table->decimal('biaya_pengiriman', 12, 2)->default(0)->after('total');
            $table->string('nomor_resi', 100)->nullable()->after('status');
        });
    }
    public function down(): void {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropColumn(['nama_penerima','metode_pengiriman','biaya_pengiriman','nomor_resi']);
        });
    }
};
