@extends('admin.layout')
@section('heading','Pengembalian & Penukaran')
@section('content')
<section class="panel"><table><tr><th>ID</th><th>Pesanan</th><th>Pelanggan</th><th>Alasan</th><th>Status</th><th>Aksi</th></tr>@foreach($pengembalian as $r)<tr><td>#{{$r->id}}</td><td>#GD-{{$r->transaksi_id}}</td><td>{{$r->user->nama}}</td><td>{{$r->alasan}}</td><td>{{$r->status}}</td><td><form method="POST" action="/admin/pengembalian/{{$r->id}}" class="inline-edit">@csrf @method('PUT')<select name="status">@foreach(['Diajukan','Diproses','Disetujui','Ditolak'] as $s)<option @selected($r->status===$s)>{{$s}}</option>@endforeach</select><input name="catatan_admin" value="{{$r->catatan_admin}}" placeholder="Catatan"><button>Simpan</button></form></td></tr>@endforeach</table>{{$pengembalian->links()}}</section>
@endsection
