<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Pengiriman extends Model {
    protected $table='pengiriman';
    protected $fillable=['nama_metode','deskripsi','biaya','estimasi_hari','aktif'];
    protected $casts=['aktif'=>'boolean'];
}
