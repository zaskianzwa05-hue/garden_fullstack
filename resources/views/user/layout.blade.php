<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>@yield('title','Garden Dreams')</title><link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>
<body>
<header class="site-header">
 <a class="brand" href="/">🌷 Garden Dreams</a>
 <nav class="main-nav">
  <a href="/">Beranda</a><a href="/produk">Produk</a><a href="/promo">Promo</a><a href="/tentang-kami">Tentang</a><a href="/blog">Blog</a>
  <a href="/keranjang">Keranjang <span class="count">{{ count(session('keranjang',[])) }}</span></a>
  @auth
    <a href="/wishlist">♡ Wishlist</a><a href="/pesanan">Pesanan</a><a href="/akun">Akun</a>
    @if(auth()->user()->role==='admin')<a href="/admin">Admin</a>@endif
    <form action="/logout" method="POST" class="inline-form">@csrf<button>Keluar</button></form>
  @else <a href="/login">Masuk</a><a class="nav-cta" href="/register">Daftar</a> @endauth
 </nav>
</header>
@if(session('success'))<div class="flash success">{{ session('success') }}</div>@endif
@if(session('error'))<div class="flash error">{{ session('error') }}</div>@endif
@if($errors->any())<div class="flash error"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
@yield('content')
<footer class="site-footer">
 <div><strong>🌷 Garden Dreams</strong><p>Bunga untuk setiap momen.</p></div>
 <div><h4>Informasi</h4><a href="/tentang-kami">Tentang Kami</a><a href="/kontak">Kontak</a><a href="/faq">FAQ</a></div>
 <div><h4>Bantuan</h4><a href="/syarat-ketentuan">Syarat & Ketentuan</a><a href="/kebijakan-privasi">Privasi</a><a href="/pesanan">Lacak Pesanan</a></div>
 <div><h4>Ikuti Kami</h4><p>Instagram · TikTok · WhatsApp</p></div>
 <p class="copyright">© {{ date('Y') }} Garden Dreams. All rights reserved.</p>
</footer>
</body></html>
