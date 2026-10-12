@extends('admin.layout')
@section('heading','Analitik & Statistik')
@section('content')
<section class="panel"><h2>Status Pesanan</h2><div class="analytics-grid">@foreach($perStatus as $status=>$total)<div><b>{{$status}}</b><strong>{{$total}}</strong></div>@endforeach</div></section>
<section class="panel"><h2>Penjualan per Kategori</h2><table><tr><th>Kategori</th><th>Total Penjualan</th></tr>@foreach($kategori as $k)<tr><td>{{$k->nama_kategori}}</td><td>Rp {{number_format($k->total,0,',','.')}}</td></tr>@endforeach</table></section>
@endsection
