@extends('user.layout')
@section('title','Pembayaran Berhasil — Garden Dreams')
@section('content')
<section class="section compact"><div class="success-card"><div class="success-icon">✓</div><span class="eyebrow">ORDER CONFIRMED</span><h1>Pembayaran berhasil</h1><p>Terima kasih! Pesananmu sedang diproses oleh Garden Dreams.</p><div class="order-number">Pesanan #GD-{{str_pad($transaksi->id,5,'0',STR_PAD_LEFT)}}</div><div class="hero-actions"><a class="btn" href="/pesanan/{{$transaksi->id}}">Lihat Pesanan</a><a class="btn btn-light" href="/produk">Belanja Lagi</a></div></div></section>
@endsection
