@extends('admin.layout')
@section('heading','Laporan Keuangan')
@section('content')
<div class="stats"><div><small>Pendapatan</small><strong>Rp {{number_format($pendapatan,0,',','.')}}</strong></div><div><small>Total Pesanan</small><strong>{{$pesanan}}</strong></div><div><small>Pengeluaran</small><strong>Rp {{number_format($pengeluaran,0,',','.')}}</strong></div><div><small>Estimasi Bersih</small><strong>Rp {{number_format($pendapatan-$pengeluaran,0,',','.')}}</strong></div></div>
<section class="panel"><h2>Produk Terlaris</h2><table><tr><th>Produk</th><th>Jumlah Terjual</th></tr>@foreach($produkTerlaris as $r)<tr><td>{{$r->produk?->nama_produk??'Produk dihapus'}}</td><td>{{$r->total_terjual}}</td></tr>@endforeach</table></section>
@endsection
