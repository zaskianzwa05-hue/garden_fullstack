@extends('admin.layout')
@section('heading','Manajemen Stok')
@section('content')
<section class="panel"><h2>Stok Produk</h2><table><tr><th>Produk</th><th>Stok</th><th>Peringatan</th><th>Aksi</th></tr>@foreach($stok as $s)<tr><td>{{$s->produk->nama_produk}}</td><td>{{$s->jumlah}}</td><td>{!!$s->jumlah<=5?'<span class="badge danger-bg">Hampir habis</span>':'<span class="badge">Aman</span>'!!}</td><td><form class="inline-edit" method="POST" action="/admin/stok/{{$s->id}}">@csrf @method('PUT')<input type="number" name="jumlah" value="{{$s->jumlah}}" min="0"><button>Simpan</button></form></td></tr>@endforeach</table>{{$stok->links()}}</section>
@endsection
