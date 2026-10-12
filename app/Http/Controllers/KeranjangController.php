<?php
namespace App\Http\Controllers;
use App\Models\Produk;
use Illuminate\Http\Request;
class KeranjangController {
 public function index(Request $r){ $keranjang=$r->session()->get('keranjang',[]); $total=collect($keranjang)->sum(fn($i)=>$i['harga']*$i['jumlah']); return view('user.keranjang',compact('keranjang','total')); }
 public function tambah(Request $r,$id){ $p=Produk::with('stok')->findOrFail($id); $stock=$p->stok?->jumlah??0; $k=$r->session()->get('keranjang',[]); $qty=($k[$id]['jumlah']??0)+1; if($qty>$stock) return back()->with('error','Stok produk tidak mencukupi.'); $k[$id]=['nama_produk'=>$p->nama_produk,'harga'=>$p->harga,'jumlah'=>$qty,'gambar'=>$p->gambar]; $r->session()->put('keranjang',$k); return back()->with('success','Produk ditambahkan ke keranjang.'); }
 public function update(Request $r,$id){ $r->validate(['jumlah'=>'required|integer|min:1']); $p=Produk::with('stok')->findOrFail($id); $k=$r->session()->get('keranjang',[]); if(!isset($k[$id])) return back(); if($r->jumlah>($p->stok?->jumlah??0)) return back()->with('error','Jumlah melebihi stok.'); $k[$id]['jumlah']=$r->jumlah; $r->session()->put('keranjang',$k); return back()->with('success','Keranjang diperbarui.');}
 public function hapus(Request $r,$id){ $k=$r->session()->get('keranjang',[]); unset($k[$id]); $r->session()->put('keranjang',$k); return back()->with('success','Produk dihapus dari keranjang.');}
}
