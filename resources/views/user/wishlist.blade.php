@extends('user.layout')
@section('title','Wishlist — Garden Dreams')
@section('content')
<section class="section compact"><div class="page-heading"><span class="eyebrow">WISHLIST</span><h1>Produk Favorit</h1></div><div class="product-grid">@forelse($wishlist as $w)<article class="product-card"><div class="product-body"><small>{{$w->produk->kategori->nama_kategori}}</small><h3>{{$w->produk->nama_produk}}</h3><p>Rp {{number_format($w->produk->harga,0,',','.')}}</p><a class="text-link" href="/produk/{{$w->produk->id}}">Lihat produk →</a><form action="/wishlist/{{$w->produk->id}}" method="POST">@csrf @method('DELETE')<button class="remove">Hapus</button></form></div></article>@empty<p>Belum ada produk di wishlist.</p>@endforelse</div></section>
@endsection
