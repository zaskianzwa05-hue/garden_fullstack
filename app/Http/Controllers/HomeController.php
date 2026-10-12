<?php
namespace App\Http\Controllers;
use App\Models\{Produk,Testimoni,Promo};
class HomeController extends Controller {
 public function index(){ $produk=Produk::with(['kategori','stok'])->latest()->limit(6)->get(); $testimoni=Testimoni::where('tampil',true)->latest()->limit(3)->get(); $promo=Promo::where('aktif',true)->whereDate('mulai','<=',now())->whereDate('berakhir','>=',now())->latest()->limit(3)->get(); return view('user.home',compact('produk','testimoni','promo')); }
}
