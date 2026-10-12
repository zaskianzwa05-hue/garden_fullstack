<?php
namespace App\Http\Controllers;

use App\Models\{Produk,Kategori,Stok,Transaksi,User,Pembayaran,Pengiriman,Pengembalian,Promo,Blog,Testimoni};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard() {
        $data=[
            'produk'=>Produk::count(),'pelanggan'=>User::where('role','user')->count(),
            'pesanan'=>Transaksi::count(),'pendapatan'=>Transaksi::whereIn('status',['Diproses','Dikirim','Selesai'])->sum('total'),
            'stokMenipis'=>Stok::where('jumlah','<=',5)->with('produk')->get(),
            'pesananTerbaru'=>Transaksi::with('user')->latest('tanggal')->limit(8)->get(),
            'penjualanBulan'=>Transaksi::whereMonth('tanggal',now()->month)->whereYear('tanggal',now()->year)->sum('total'),
        ];
        return view('admin.dashboard',$data);
    }

    public function produk(Request $r) {
        $produk=Produk::with(['kategori','stok'])->when($r->q,fn($q)=>$q->where('nama_produk','like','%'.$r->q.'%'))->latest()->paginate(10);
        $kategori=Kategori::orderBy('nama_kategori')->get();
        return view('admin.produk.index',compact('produk','kategori'));
    }
    public function produkStore(Request $r) {
        $d=$r->validate(['nama_produk'=>'required|max:150','kategori_id'=>'required|exists:kategori,id','harga'=>'required|numeric|min:0','deskripsi'=>'nullable','stok'=>'required|integer|min:0']);
        $p=Produk::create(collect($d)->except('stok')->toArray());
        Stok::create(['produk_id'=>$p->id,'jumlah'=>$d['stok']]);
        return back()->with('success','Produk berhasil ditambahkan.');
    }
    public function produkUpdate(Request $r,$id) {
        $p=Produk::findOrFail($id);
        $d=$r->validate(['nama_produk'=>'required|max:150','kategori_id'=>'required|exists:kategori,id','harga'=>'required|numeric|min:0','deskripsi'=>'nullable','stok'=>'required|integer|min:0']);
        $p->update(collect($d)->except('stok')->toArray());
        $p->stok()->updateOrCreate(['produk_id'=>$p->id],['jumlah'=>$d['stok']]);
        return back()->with('success','Produk berhasil diperbarui.');
    }
    public function produkDelete($id) { Produk::findOrFail($id)->delete(); return back()->with('success','Produk dihapus.'); }

    public function kategori() { $kategori=Kategori::withCount('produk')->latest()->get(); return view('admin.kategori',compact('kategori')); }
    public function kategoriStore(Request $r){ $d=$r->validate(['nama_kategori'=>'required|max:100','deskripsi'=>'nullable']); Kategori::create($d); return back()->with('success','Kategori ditambahkan.');}
    public function kategoriDelete($id){ Kategori::findOrFail($id)->delete(); return back()->with('success','Kategori dihapus.'); }

    public function stok(){ $stok=Stok::with('produk')->orderBy('jumlah')->paginate(15); return view('admin.stok',compact('stok')); }
    public function stokUpdate(Request $r,$id){ $d=$r->validate(['jumlah'=>'required|integer|min:0']); Stok::findOrFail($id)->update($d); return back()->with('success','Stok diperbarui.');}

    public function pelanggan(Request $r){ $pelanggan=User::where('role','user')->withCount('transaksi')->when($r->q,fn($q)=>$q->where('nama','like','%'.$r->q.'%')->orWhere('email','like','%'.$r->q.'%'))->latest()->paginate(15); return view('admin.pelanggan',compact('pelanggan')); }
    public function pelangganDelete($id){ User::where('role','user')->findOrFail($id)->delete(); return back()->with('success','Pelanggan dihapus.'); }

    public function pesanan(Request $r){ $pesanan=Transaksi::with(['user','pembayaran'])->when($r->status,fn($q)=>$q->where('status',$r->status))->latest('tanggal')->paginate(15); return view('admin.pesanan',compact('pesanan')); }
    public function pesananUpdate(Request $r,$id){ $d=$r->validate(['status'=>'required|in:Menunggu,Diproses,Dikirim,Selesai,Dibatalkan','nomor_resi'=>'nullable|max:100']); Transaksi::findOrFail($id)->update($d); return back()->with('success','Status pesanan diperbarui.'); }

    public function pembayaran(Request $r){ $pembayaran=Pembayaran::with('transaksi.user')->latest('tanggal')->paginate(15); return view('admin.pembayaran',compact('pembayaran')); }
    public function pembayaranUpdate(Request $r,$id){ $d=$r->validate(['status'=>'required|in:Menunggu,Berhasil,Gagal']); $p=Pembayaran::findOrFail($id); $p->update($d); if($d['status']==='Berhasil') $p->transaksi()->update(['status'=>'Diproses']); return back()->with('success','Pembayaran diperbarui.'); }

    public function pengiriman(){ $pengiriman=Pengiriman::latest()->get(); return view('admin.pengiriman',compact('pengiriman')); }
    public function pengirimanStore(Request $r){ $d=$r->validate(['nama_metode'=>'required|max:60','deskripsi'=>'nullable','biaya'=>'required|numeric|min:0','estimasi_hari'=>'required|integer|min:0']); Pengiriman::create($d); return back()->with('success','Metode pengiriman ditambahkan.');}
    public function pengirimanDelete($id){ Pengiriman::findOrFail($id)->delete(); return back()->with('success','Metode pengiriman dihapus.');}

    public function pengembalian(){ $pengembalian=Pengembalian::with(['transaksi','user'])->latest()->paginate(15); return view('admin.pengembalian',compact('pengembalian')); }
    public function pengembalianUpdate(Request $r,$id){ $d=$r->validate(['status'=>'required|in:Diajukan,Diproses,Disetujui,Ditolak','catatan_admin'=>'nullable']); Pengembalian::findOrFail($id)->update($d); return back()->with('success','Pengembalian diperbarui.');}

    public function pengguna(){ $pengguna=User::latest()->paginate(15); return view('admin.pengguna',compact('pengguna')); }
    public function penggunaUpdate(Request $r,$id){ $u=User::findOrFail($id); $d=$r->validate(['nama'=>'required|max:100','email'=>'required|email|unique:users,email,'.$id,'role'=>'required|in:admin,user','no_hp'=>'nullable|max:20']); $u->update($d); return back()->with('success','Pengguna diperbarui.');}
    public function penggunaDelete($id){ User::findOrFail($id)->delete(); return back()->with('success','Pengguna dihapus.');}

    public function promo(){ $promo=Promo::latest()->get(); return view('admin.promo',compact('promo')); }
    public function promoStore(Request $r){ $d=$r->validate(['kode'=>'required|max:30|unique:promo,kode','nama'=>'required|max:100','deskripsi'=>'nullable','tipe'=>'required|in:persen,nominal','nilai'=>'required|numeric|min:0','min_belanja'=>'required|numeric|min:0','mulai'=>'required|date','berakhir'=>'required|date|after_or_equal:mulai']); Promo::create($d); return back()->with('success','Promo ditambahkan.');}
    public function promoDelete($id){ Promo::findOrFail($id)->delete(); return back()->with('success','Promo dihapus.');}

    public function blog(){ $blog=Blog::latest()->get(); return view('admin.blog',compact('blog')); }
    public function blogStore(Request $r){ $d=$r->validate(['judul'=>'required|max:180','ringkasan'=>'nullable','isi'=>'required','gambar'=>'nullable','publish'=>'nullable']); $d['slug']=Str::slug($d['judul']).'-'.Str::lower(Str::random(4)); $d['publish']=$r->boolean('publish'); Blog::create($d); return back()->with('success','Artikel ditambahkan.');}
    public function blogDelete($id){ Blog::findOrFail($id)->delete(); return back()->with('success','Artikel dihapus.');}

    public function testimoni(){ $testimoni=Testimoni::latest()->get(); return view('admin.testimoni',compact('testimoni')); }
    public function testimoniUpdate(Request $r,$id){ Testimoni::findOrFail($id)->update(['tampil'=>$r->boolean('tampil')]); return back()->with('success','Testimoni diperbarui.');}

    public function laporan(){
        $pendapatan=Transaksi::whereIn('status',['Diproses','Dikirim','Selesai'])->sum('total');
        $pesanan=Transaksi::count();
        $pengeluaran=0;
        $produkTerlaris=DB::table('detail_transaksi')->select('produk_id',DB::raw('SUM(jumlah) as total_terjual'))->groupBy('produk_id')->orderByDesc('total_terjual')->limit(10)->get();
        foreach($produkTerlaris as $row){ $row->produk=Produk::find($row->produk_id); }
        return view('admin.laporan',compact('pendapatan','pesanan','pengeluaran','produkTerlaris'));
    }
    public function crm(){
        $pelanggan=User::where('role','user')->withCount('transaksi')->withSum('transaksi','total')->orderByDesc('transaksi_sum_total')->paginate(15);
        return view('admin.crm',compact('pelanggan'));
    }

    public function pengaturan(){
        $pengaturan=\App\Models\Pengaturan::orderBy('kunci')->get()->keyBy('kunci');
        return view('admin.pengaturan',compact('pengaturan'));
    }
    public function pengaturanStore(\Illuminate\Http\Request $r){
        $d=$r->validate(['nama_toko'=>'required','logo'=>'nullable','telepon'=>'nullable','email'=>'nullable|email','alamat'=>'nullable']);
        foreach($d as $k=>$v) \App\Models\Pengaturan::updateOrCreate(['kunci'=>$k],['nilai'=>$v]);
        return back()->with('success','Pengaturan website disimpan.');
    }

    public function analitik(){
        $perStatus=Transaksi::select('status',DB::raw('COUNT(*) total'))->groupBy('status')->pluck('total','status');
        $kategori=[]; foreach(Kategori::with('produk')->get() as $cat){ $total=0; foreach($cat->produk as $pr){ $total += DB::table('detail_transaksi')->where('produk_id',$pr->id)->sum('subtotal'); } if($total>0) $kategori[]=(object)['nama_kategori'=>$cat->nama_kategori,'total'=>$total]; } usort($kategori,fn($a,$b)=>$b->total<=>$a->total);
        return view('admin.analitik',compact('perStatus','kategori'));
    }
}
