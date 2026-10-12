<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Blog extends Model {
    protected $table='blog';
    protected $fillable=['judul','slug','ringkasan','isi','gambar','publish'];
    protected $casts=['publish'=>'boolean'];
}
