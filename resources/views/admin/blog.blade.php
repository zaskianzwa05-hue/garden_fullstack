@extends('admin.layout')
@section('heading','Manajemen Blog / Berita')
@section('content')
<div class="two-col"><section class="panel"><h2>Tulis Artikel</h2><form method="POST">@csrf<label>Judul<input name="judul" required></label><label>Ringkasan<textarea name="ringkasan"></textarea></label><label>Isi<textarea name="isi" rows="8" required></textarea></label><label>Gambar URL<input name="gambar"></label><label class="check"><input type="checkbox" name="publish" checked> Publikasikan</label><button class="primary">Terbitkan</button></form></section><section class="panel"><h2>Artikel</h2>@foreach($blog as $b)<div class="admin-item"><div><b>{{$b->judul}}</b><small>{{$b->publish?'Published':'Draft'}} · {{$b->created_at->format('d M Y')}}</small></div><form method="POST" action="/admin/blog/{{$b->id}}">@csrf @method('DELETE')<button class="danger">Hapus</button></form></div>@endforeach</section></div>
@endsection
