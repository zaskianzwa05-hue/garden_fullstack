<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Stok;
use App\Models\Pengiriman;
use App\Models\Promo;
use App\Models\Testimoni;
use App\Models\Blog;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        $admin=User::firstOrCreate(['email'=>'admin@gardendreams.test'],[
            'nama'=>'Admin Garden Dreams',
            'password'=>'garden12345',
            'role'=>'admin',
            'no_hp'=>'081234567890'
        ]);
        $categories=[
            ['nama_kategori'=>'Bouquet','deskripsi'=>'Rangkaian bunga untuk berbagai momen.'],
            ['nama_kategori'=>'Bunga Segar','deskripsi'=>'Bunga segar pilihan dengan kualitas terbaik.'],
            ['nama_kategori'=>'Hampers','deskripsi'=>'Hampers cantik untuk hadiah.'],
        ];
        foreach($categories as $c){ Kategori::firstOrCreate(['nama_kategori'=>$c['nama_kategori']],$c); }
        if(Produk::count()===0){
            $items=[
                ['Bouquet','Spring Love',185000,'Bouquet bernuansa lembut untuk orang tersayang.'],
                ['Bouquet','Pastel Bloom',220000,'Kombinasi bunga pastel yang elegan.'],
                ['Bunga Segar','White Lily',150000,'Lily putih segar untuk suasana yang menenangkan.'],
                ['Bunga Segar','Pink Rose',175000,'Mawar pink pilihan yang romantis.'],
                ['Hampers','Garden Gift Box',250000,'Hampers bunga dan hadiah dalam satu box.'],
                ['Hampers','Blooming Basket',275000,'Keranjang bunga premium untuk hadiah spesial.'],
            ];
            foreach($items as [$cat,$name,$price,$desc]){
                $k=Kategori::where('nama_kategori',$cat)->first();
                $pr=Produk::create(['kategori_id'=>$k->id,'nama_produk'=>$name,'harga'=>$price,'deskripsi'=>$desc,'gambar'=>null]);
                Stok::create(['produk_id'=>$pr->id,'jumlah'=>20]);
            }
        }
        if(Pengiriman::count()===0){
            Pengiriman::insert([
                ['nama_metode'=>'Reguler','deskripsi'=>'Pengiriman standar','biaya'=>15000,'estimasi_hari'=>3,'aktif'=>1,'created_at'=>now(),'updated_at'=>now()],
                ['nama_metode'=>'Express','deskripsi'=>'Lebih cepat untuk pesanan mendesak','biaya'=>25000,'estimasi_hari'=>1,'aktif'=>1,'created_at'=>now(),'updated_at'=>now()],
                ['nama_metode'=>'Same Day','deskripsi'=>'Tiba di hari yang sama untuk area tertentu','biaya'=>35000,'estimasi_hari'=>0,'aktif'=>1,'created_at'=>now(),'updated_at'=>now()],
            ]);
        }
        if(Promo::count()===0){
            Promo::create(['kode'=>'WELCOME10','nama'=>'Welcome 10%','deskripsi'=>'Diskon pelanggan baru.','tipe'=>'persen','nilai'=>10,'min_belanja'=>100000,'mulai'=>now()->toDateString(),'berakhir'=>now()->addMonths(2)->toDateString(),'aktif'=>true]);
        }
        if(Testimoni::count()===0){
            Testimoni::insert([
                ['nama'=>'Alya','isi'=>'Bunganya datang rapi dan sesuai foto. Cantik banget!','rating'=>5,'tampil'=>1,'created_at'=>now(),'updated_at'=>now()],
                ['nama'=>'Nadia','isi'=>'Pesan untuk ulang tahun jadi lebih mudah.','rating'=>5,'tampil'=>1,'created_at'=>now(),'updated_at'=>now()],
            ]);
        }
        if(Blog::count()===0){
            Blog::insert([
                ['judul'=>'Cara Merawat Bouquet Agar Lebih Awet','slug'=>'cara-merawat-bouquet-agar-lebih-awet','ringkasan'=>'Tips sederhana merawat bunga setelah menerima bouquet.','isi'=>'Letakkan bunga di tempat yang sejuk, ganti air secara berkala, dan potong sedikit bagian batang secara miring. Hindari paparan matahari langsung.','publish'=>1,'created_at'=>now(),'updated_at'=>now()],
                ['judul'=>'Memilih Bunga untuk Setiap Momen','slug'=>'memilih-bunga-untuk-setiap-momen','ringkasan'=>'Panduan memilih bunga untuk ulang tahun, wisuda, dan hari spesial.','isi'=>'Pilih warna dan jenis bunga sesuai karakter momen. Untuk hadiah romantis, mawar bisa menjadi pilihan. Untuk ucapan selamat, bouquet warna cerah cocok digunakan.','publish'=>1,'created_at'=>now(),'updated_at'=>now()],
            ]);
        }
    }
}
