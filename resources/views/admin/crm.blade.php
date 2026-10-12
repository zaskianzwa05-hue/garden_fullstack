@extends('admin.layout')
@section('heading','CRM — Customer Relationship Management')
@section('content')
<section class="panel"><p>Daftar pelanggan diurutkan berdasarkan nilai transaksi untuk membantu menentukan prioritas follow-up.</p><table><tr><th>Pelanggan</th><th>Email</th><th>Jumlah Pesanan</th><th>Total Belanja</th><th>Segmentasi</th></tr>@foreach($pelanggan as $p)<tr><td>{{$p->nama}}</td><td>{{$p->email}}</td><td>{{$p->transaksi_count}}</td><td>Rp {{number_format($p->transaksi_sum_total??0,0,',','.')}}</td><td>{{($p->transaksi_sum_total??0)>=500000?'VIP':'Regular'}}</td></tr>@endforeach</table>{{$pelanggan->links()}}</section>
@endsection
