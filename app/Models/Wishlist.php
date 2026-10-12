<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Wishlist extends Model {
    protected $table='wishlist';
    protected $fillable=['user_id','produk_id'];
    public function produk(): BelongsTo { return $this->belongsTo(Produk::class,'produk_id'); }
}
