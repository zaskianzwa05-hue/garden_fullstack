@extends('user.layout')
@section('title','Pembayaran — Garden Dreams')
@section('content')
<section class="section compact"><div class="payment-card"><span class="eyebrow">PAYMENT</span><h1>Konfirmasi Pembayaran</h1><p>Pesanan #GD-{{str_pad($transaksi->id,5,'0',STR_PAD_LEFT)}} · Rp {{number_format($transaksi->total,0,',','.')}}</p><div class="payment-method"><h3>Metode: {{$transaksi->pembayaran->metode}}</h3><p>Status saat ini: {{$transaksi->pembayaran->status}}</p><p>Untuk simulasi tugas, klik tombol di bawah untuk menandai pembayaran berhasil.</p></div><form action="/pembayaran/{{$transaksi->id}}/proses" method="POST">@csrf<button class="btn full">Konfirmasi Pembayaran</button></form></div></section>
@endsection
