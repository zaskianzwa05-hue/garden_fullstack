@extends('admin.layout')
@section('title','Dashboard Admin')
@section('heading','Dashboard')
@section('content')
<div class="stats"><div><small>Total Produk</small><strong>{{$produk}}</strong></div><div><small>Pelanggan</small><strong>{{$pelanggan}}</strong></div><div><small>Total Pesanan</small><strong>{{$pesanan}}</strong></div><div><small>Pendapatan</small><strong>Rp {{number_format($pendapatan,0,',','.')}}</strong></div></div>
<div class="two-col"><section class="panel"><div class="panel-head"><h2>Pesanan Terbaru</h2><a href="/admin/pesanan">Lihat semua</a></div><table><tr><th>ID</th><th>Pelanggan</th><th>Total</th><th>Status</th></tr>@foreach($pesananTerbaru as $p)<tr><td>#GD-{{$p->id}}</td><td>{{$p->user->nama}}</td><td>Rp {{number_format($p->total,0,',','.')}}</td><td><span class="badge">{{$p->status}}</span></td></tr>@endforeach</table></section><section class="panel"><h2>Stok Menipis</h2>@forelse($stokMenipis as $s)<div class="list-row"><span>{{$s->produk->nama_produk}}</span><b>{{$s->jumlah}}</b></div>@empty<p>Semua stok aman.</p>@endforelse</section></div>
<div class="panel"><h2>Ringkasan Bulan Ini</h2><p>Pendapatan bulan ini: <b>Rp {{number_format($penjualanBulan,0,',','.')}}</b></p><p>Dashboard ini menjadi pusat monitoring operasional Garden Dreams.</p></div>
@endsection
