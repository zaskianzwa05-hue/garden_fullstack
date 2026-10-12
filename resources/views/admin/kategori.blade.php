@extends('admin.layout')
@section('heading','Manajemen Kategori')
@section('content')
<div class="two-col"><section class="panel"><h2>Tambah Kategori</h2><form method="POST">@csrf<label>Nama<input name="nama_kategori" required></label><label>Deskripsi<textarea name="deskripsi"></textarea></label><button class="primary">Tambah</button></form></section><section class="panel"><h2>Daftar Kategori</h2>@foreach($kategori as $k)<div class="admin-item"><div><b>{{$k->nama_kategori}}</b><small>{{$k->produk_count}} produk · {{$k->deskripsi}}</small></div><form method="POST" action="/admin/kategori/{{$k->id}}">@csrf @method('DELETE')<button class="danger">Hapus</button></form></div>@endforeach</section></div>
@endsection
