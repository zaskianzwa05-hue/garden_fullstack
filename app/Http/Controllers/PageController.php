<?php
namespace App\Http\Controllers;
use App\Models\{Blog,Testimoni,Promo,Pengiriman,Produk,Kategori};
use Illuminate\Http\Request;
class PageController extends Controller {
    public function home(){ $produk=Produk::with(['kategori','stok'])->latest()->limit(6)->get(); $testimoni=Testimoni::where('tampil',true)->latest()->limit(3)->get(); $promo=Promo::where('aktif',true)->latest()->limit(3)->get(); return view('user.home',compact('produk','testimoni','promo')); }
    public function about(){ return view('user.about'); }
    public function contact(){ return view('user.contact'); }
    public function faq(){ return view('user.faq'); }
    public function terms(){ return view('user.terms'); }
    public function privacy(){ return view('user.privacy'); }
    public function testimonials(){ $testimoni=Testimoni::where('tampil',true)->latest()->get(); return view('user.testimonials',compact('testimoni')); }
    public function blog(){ $blog=Blog::where('publish',true)->latest()->get(); return view('user.blog',compact('blog')); }
    public function blogShow($slug){ $artikel=Blog::where('slug',$slug)->where('publish',true)->firstOrFail(); return view('user.blog-detail',compact('artikel')); }
    public function promo(){ $promo=Promo::where('aktif',true)->whereDate('mulai','<=',now())->whereDate('berakhir','>=',now())->latest()->get(); return view('user.promo',compact('promo')); }
    public function contactStore(Request $r){ $d=$r->validate(['nama'=>'required','email'=>'required|email','pesan'=>'required']); return back()->with('success','Pesan berhasil dikirim. Tim Garden Dreams akan menghubungi kamu.'); }
}
