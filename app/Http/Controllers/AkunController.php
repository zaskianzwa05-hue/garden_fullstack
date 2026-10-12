<?php
namespace App\Http\Controllers;
use App\Models\{Wishlist,Transaksi,User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AkunController extends Controller {
    public function index(){ $user=auth()->user(); return view('user.akun',compact('user')); }
    public function update(Request $r){ $u=auth()->user(); $d=$r->validate(['nama'=>'required|max:100','email'=>'required|email|unique:users,email,'.$u->id,'no_hp'=>'nullable|max:20']); $u->update($d); return back()->with('success','Profil berhasil diperbarui.'); }
    public function password(Request $r){ $r->validate(['password_lama'=>'required','password'=>'required|min:8|confirmed']); if(!Hash::check($r->password_lama,auth()->user()->password)) return back()->withErrors(['password_lama'=>'Password lama tidak sesuai.']); auth()->user()->update(['password'=>$r->password]); return back()->with('success','Password berhasil diganti.');}
    public function wishlist(){ $wishlist=Wishlist::where('user_id',auth()->id())->with(['produk.kategori','produk.stok'])->latest()->get(); return view('user.wishlist',compact('wishlist')); }
    public function addWishlist($id){ Wishlist::firstOrCreate(['user_id'=>auth()->id(),'produk_id'=>$id]); return back()->with('success','Produk ditambahkan ke wishlist.'); }
    public function removeWishlist($id){ Wishlist::where('user_id',auth()->id())->where('produk_id',$id)->delete(); return back()->with('success','Produk dihapus dari wishlist.');}
}
