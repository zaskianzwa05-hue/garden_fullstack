<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Testimoni extends Model {
    protected $table='testimoni';
    protected $fillable=['user_id','nama','isi','rating','tampil'];
    protected $casts=['tampil'=>'boolean'];
}
