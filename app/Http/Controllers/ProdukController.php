<?php
namespace App\Http\Controllers;
use App\Models\{Produk,Kategori};
use Illuminate\Http\Request;
class ProdukController extends Controller {
 public function index(Request $r){ $produk=Produk::with(['kategori','stok'])->when($r->kategori,fn($q)=>$q->where('kategori_id',$r->kategori))->when($r->q,fn($q)=>$q->where('nama_produk','like','%'.$r->q.'%'))->when($r->sort==='murah',fn($q)=>$q->orderBy('harga'))->when($r->sort==='mahal',fn($q)=>$q->orderByDesc('harga'))->when(!$r->sort,fn($q)=>$q->latest())->paginate(12)->withQueryString(); $kategori=Kategori::orderBy('nama_kategori')->get(); return view('user.produk',compact('produk','kategori')); }
 public function show($id){ $produk=Produk::with(['kategori','stok'])->findOrFail($id); $terkait=Produk::where('kategori_id',$produk->kategori_id)->where('id','!=',$produk->id)->limit(4)->get(); return view('user.detail-produk',compact('produk','terkait')); }
}
