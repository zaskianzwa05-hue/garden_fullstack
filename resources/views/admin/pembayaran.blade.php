@extends('admin.layout')
@section('heading','Manajemen Pembayaran')
@section('content')
<section class="panel"><table><tr><th>Pesanan</th><th>Pelanggan</th><th>Metode</th><th>Jumlah</th><th>Status</th><th>Aksi</th></tr>@foreach($pembayaran as $p)<tr><td>#GD-{{$p->transaksi_id}}</td><td>{{$p->transaksi->user->nama}}</td><td>{{$p->metode}}</td><td>Rp {{number_format($p->jumlah,0,',','.')}}</td><td>{{$p->status}}</td><td><form method="POST" action="/admin/pembayaran/{{$p->id}}" class="inline-edit">@csrf @method('PUT')<select name="status"><option>Menunggu</option><option>Berhasil</option><option>Gagal</option></select><button>Update</button></form></td></tr>@endforeach</table>{{$pembayaran->links()}}</section>
@endsection
