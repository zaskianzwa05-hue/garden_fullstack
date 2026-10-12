<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController,ProdukController,KeranjangController,CheckoutController,PembayaranController,PesananController,LoginController,RegisterController,PageController,AkunController,AdminController};

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/tentang-kami',[PageController::class,'about']);
Route::get('/kontak',[PageController::class,'contact']);
Route::post('/kontak',[PageController::class,'contactStore']);
Route::get('/faq',[PageController::class,'faq']);
Route::get('/syarat-ketentuan',[PageController::class,'terms']);
Route::get('/kebijakan-privasi',[PageController::class,'privacy']);
Route::get('/testimoni',[PageController::class,'testimonials']);
Route::get('/blog',[PageController::class,'blog']);
Route::get('/blog/{slug}',[PageController::class,'blogShow']);
Route::get('/promo',[PageController::class,'promo']);

Route::get('/produk',[ProdukController::class,'index'])->name('produk');
Route::get('/produk/{id}',[ProdukController::class,'show']);
Route::get('/keranjang',[KeranjangController::class,'index']);
Route::post('/keranjang/tambah/{id}',[KeranjangController::class,'tambah']);
Route::post('/keranjang/update/{id}',[KeranjangController::class,'update']);
Route::post('/keranjang/hapus/{id}',[KeranjangController::class,'hapus']);

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'proses']);
Route::post('/logout',[LoginController::class,'logout']);
Route::get('/register',[RegisterController::class,'index']);
Route::post('/register',[RegisterController::class,'proses']);

Route::middleware('auth')->group(function(){
 Route::get('/akun',[AkunController::class,'index']);
 Route::post('/akun',[AkunController::class,'update']);
 Route::post('/akun/password',[AkunController::class,'password']);
 Route::get('/wishlist',[AkunController::class,'wishlist']);
 Route::post('/wishlist/{id}',[AkunController::class,'addWishlist']);
 Route::delete('/wishlist/{id}',[AkunController::class,'removeWishlist']);
 Route::get('/checkout',[CheckoutController::class,'index']);
 Route::post('/checkout/proses',[CheckoutController::class,'proses']);
 Route::get('/pembayaran/{id}',[PembayaranController::class,'index']);
 Route::post('/pembayaran/{id}/proses',[PembayaranController::class,'proses']);
 Route::get('/pembayaran/{id}/berhasil',[PembayaranController::class,'berhasil']);
 Route::get('/pesanan',[PesananController::class,'index']);
 Route::get('/pesanan/{id}',[PesananController::class,'show']);
 Route::get('/pesanan/{id}/pengembalian',[PesananController::class,'returnForm']);
 Route::post('/pesanan/{id}/pengembalian',[PesananController::class,'returnStore']);
});

Route::prefix('admin')->middleware(['auth','admin'])->group(function(){
 Route::get('/',[AdminController::class,'dashboard']);
 Route::get('/produk',[AdminController::class,'produk']); Route::post('/produk',[AdminController::class,'produkStore']); Route::put('/produk/{id}',[AdminController::class,'produkUpdate']); Route::delete('/produk/{id}',[AdminController::class,'produkDelete']);
 Route::get('/kategori',[AdminController::class,'kategori']); Route::post('/kategori',[AdminController::class,'kategoriStore']); Route::delete('/kategori/{id}',[AdminController::class,'kategoriDelete']);
 Route::get('/stok',[AdminController::class,'stok']); Route::put('/stok/{id}',[AdminController::class,'stokUpdate']);
 Route::get('/pelanggan',[AdminController::class,'pelanggan']); Route::delete('/pelanggan/{id}',[AdminController::class,'pelangganDelete']);
 Route::get('/pesanan',[AdminController::class,'pesanan']); Route::put('/pesanan/{id}',[AdminController::class,'pesananUpdate']);
 Route::get('/pembayaran',[AdminController::class,'pembayaran']); Route::put('/pembayaran/{id}',[AdminController::class,'pembayaranUpdate']);
 Route::get('/pengiriman',[AdminController::class,'pengiriman']); Route::post('/pengiriman',[AdminController::class,'pengirimanStore']); Route::delete('/pengiriman/{id}',[AdminController::class,'pengirimanDelete']);
 Route::get('/pengembalian',[AdminController::class,'pengembalian']); Route::put('/pengembalian/{id}',[AdminController::class,'pengembalianUpdate']);
 Route::get('/pengguna',[AdminController::class,'pengguna']); Route::put('/pengguna/{id}',[AdminController::class,'penggunaUpdate']); Route::delete('/pengguna/{id}',[AdminController::class,'penggunaDelete']);
 Route::get('/promo',[AdminController::class,'promo']); Route::post('/promo',[AdminController::class,'promoStore']); Route::delete('/promo/{id}',[AdminController::class,'promoDelete']);
 Route::get('/blog',[AdminController::class,'blog']); Route::post('/blog',[AdminController::class,'blogStore']); Route::delete('/blog/{id}',[AdminController::class,'blogDelete']);
 Route::get('/testimoni',[AdminController::class,'testimoni']); Route::put('/testimoni/{id}',[AdminController::class,'testimoniUpdate']);
 Route::get('/laporan',[AdminController::class,'laporan']);
 Route::get('/crm',[AdminController::class,'crm']);
 Route::get('/analitik',[AdminController::class,'analitik']);
 Route::get('/pengaturan',[AdminController::class,'pengaturan']); Route::post('/pengaturan',[AdminController::class,'pengaturanStore']);
});
