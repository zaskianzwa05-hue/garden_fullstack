@extends('user.layout')
@section('title','Pesanan Saya — Garden Dreams')
@section('content')
<section class="section compact"><div class="page-heading"><span class="eyebrow">MY ORDERS</span><h1>Riwayat Pesanan</h1></div>@forelse($pesanan as $p)<div class="order-card"><div><small>#GD-{{str_pad($p->id,5,'0',STR_PAD_LEFT)}} · {{$p->tanggal->format('d M Y H:i')}}</small><h3>Rp {{number_format($p->total,0,',','.')}}</h3><p>{{$p->metode_pengiriman}} · {{$p->pembayaran?->metode}}</p></div><span class="status {{$p->status}}">{{$p->status}}</span><a class="text-link" href="/pesanan/{{$p->id}}">Detail →</a></div>@empty<div class="empty-state"><h2>Belum ada pesanan</h2><a class="btn" href="/produk">Belanja Sekarang</a></div>@endforelse</section>
@endsection
