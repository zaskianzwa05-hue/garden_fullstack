<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Promo extends Model {
    protected $table='promo';
    protected $fillable=['kode','nama','deskripsi','tipe','nilai','min_belanja','mulai','berakhir','aktif'];
    protected $casts=['mulai'=>'date','berakhir'=>'date','aktif'=>'boolean'];
    public function masihBerlaku(): bool { $n=now()->toDateString(); return $this->aktif && $this->mulai->toDateString() <= $n && $this->berakhir->toDateString() >= $n; }
}
