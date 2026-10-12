@extends('admin.layout')
@section('heading','Manajemen Pengiriman')
@section('content')
<div class="two-col"><section class="panel"><h2>Tambah Metode</h2><form method="POST">@csrf<label>Nama<input name="nama_metode" required></label><label>Deskripsi<textarea name="deskripsi"></textarea></label><label>Biaya<input type="number" name="biaya" min="0" required></label><label>Estimasi hari<input type="number" name="estimasi_hari" min="0" required></label><button class="primary">Tambah</button></form></section><section class="panel"><h2>Metode Pengiriman</h2>@foreach($pengiriman as $p)<div class="admin-item"><div><b>{{$p->nama_metode}}</b><small>Rp {{number_format($p->biaya,0,',','.')}} · {{$p->estimasi_hari}} hari</small></div><form method="POST" action="/admin/pengiriman/{{$p->id}}">@csrf @method('DELETE')<button class="danger">Hapus</button></form></div>@endforeach</section></div>
@endsection
