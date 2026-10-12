@extends('user.layout')
@section('title','Garden Dreams — Bunga untuk Setiap Momen')
@section('content')
<section class="hero-home">
 <div class="hero-copy"><span class="eyebrow">BLOOM WITH LOVE</span><h1>Bunga untuk setiap momen yang ingin kamu abadikan.</h1><p>Garden Dreams menghadirkan bouquet, bunga segar, dan hampers dengan tampilan cantik untuk hadiah yang lebih berkesan.</p><div class="hero-actions"><a href="/produk" class="btn">Belanja Sekarang</a><a href="/tentang-kami" class="btn btn-light">Kenal Kami</a></div></div>
 <div class="hero-art"><div class="flower-art">🌷<span>🌸</span><b>garden<br>dreams</b></div></div>
</section>
<section class="section"><div class="section-head"><div><span class="eyebrow">PILIHAN KAMI</span><h2>Favorit pelanggan</h2></div><a href="/produk">Lihat semua →</a></div>
<div class="product-grid">@foreach($produk as $item)<article class="product-card"><a href="/produk/{{$item->id}}" class="product-image">@if($item->gambar)<img src="{{asset('storage/'.$item->gambar)}}" alt="{{$item->nama_produk}}">@else<div class="flower-placeholder">🌷</div>@endif</a><div class="product-body"><small>{{$item->kategori->nama_kategori}}</small><h3>{{$item->nama_produk}}</h3><p>Rp {{number_format($item->harga,0,',','.')}}</p><a class="text-link" href="/produk/{{$item->id}}">Lihat detail</a></div></article>@endforeach</div></section>
@if($promo->count())<section class="promo-strip"><div><span class="eyebrow">SPECIAL OFFER</span><h2>Hadiah kecil, senyum yang besar.</h2><p>Cek promo yang sedang berlangsung dan gunakan kesempatan terbaikmu.</p></div><a class="btn" href="/promo">Lihat Promo</a></section>@endif
<section class="section"><div class="section-head"><div><span class="eyebrow">CERITA MEREKA</span><h2>Apa kata pelanggan?</h2></div><a href="/testimoni">Semua testimoni →</a></div><div class="testimonial-grid">@foreach($testimoni as $t)<div class="quote"><div class="stars">★★★★★</div><p>“{{$t->isi}}”</p><strong>{{$t->nama}}</strong></div>@endforeach</div></section>
<section class="newsletter"><h2>Temukan inspirasi bunga berikutnya.</h2><p>Jelajahi blog Garden Dreams untuk tips dan ide hadiah.</p><a href="/blog" class="btn">Baca Blog</a></section>
@endsection
