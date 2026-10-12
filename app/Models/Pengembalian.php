<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Pengembalian extends Model {
    protected $table='pengembalian';
    protected $fillable=['transaksi_id','user_id','alasan','status','catatan_admin'];
    public function transaksi(): BelongsTo { return $this->belongsTo(Transaksi::class,'transaksi_id'); }
}
