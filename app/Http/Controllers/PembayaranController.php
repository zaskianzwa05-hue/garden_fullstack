<?php
namespace App\Http\Controllers;
use App\Models\Transaksi;
use Illuminate\Http\Request;
class PembayaranController {
 public function index($id){ $transaksi=Transaksi::with('pembayaran','detailTransaksi.produk')->where('user_id',auth()->id())->findOrFail($id); return view('user.pembayaran',compact('transaksi')); }
 public function proses(Request $r,$id){ $transaksi=Transaksi::with('pembayaran')->where('user_id',auth()->id())->findOrFail($id); if(!$transaksi->pembayaran) abort(404); $transaksi->pembayaran->update(['status'=>'Berhasil']); $transaksi->update(['status'=>'Diproses']); return redirect('/pembayaran/'.$id.'/berhasil'); }
 public function berhasil($id){ $transaksi=Transaksi::where('user_id',auth()->id())->findOrFail($id); return view('user.pembayaran-berhasil',compact('transaksi')); }
}
