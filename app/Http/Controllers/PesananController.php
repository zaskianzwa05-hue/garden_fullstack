<?php
namespace App\Http\Controllers;
use App\Models\{Transaksi,Pengembalian};
use Illuminate\Http\Request;
class PesananController {
 public function index(){ $pesanan=Transaksi::with('pembayaran')->where('user_id',auth()->id())->latest('tanggal')->get(); return view('user.pesanan',compact('pesanan')); }
 public function show($id){ $pesanan=Transaksi::with(['pembayaran','detailTransaksi.produk'])->where('user_id',auth()->id())->findOrFail($id); return view('user.detail-pesanan',compact('pesanan')); }
 public function returnForm($id){ $pesanan=Transaksi::where('user_id',auth()->id())->where('status','Selesai')->findOrFail($id); return view('user.pengembalian',compact('pesanan')); }
 public function returnStore(Request $r,$id){ $r->validate(['alasan'=>'required|min:10']); $pesanan=Transaksi::where('user_id',auth()->id())->where('status','Selesai')->findOrFail($id); Pengembalian::create(['transaksi_id'=>$pesanan->id,'user_id'=>auth()->id(),'alasan'=>$r->alasan]); return redirect('/pesanan/'.$id)->with('success','Pengajuan pengembalian berhasil dikirim.');}
}
