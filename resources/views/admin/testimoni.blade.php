@extends('admin.layout')
@section('heading','Manajemen Testimoni')
@section('content')
<section class="panel"><table><tr><th>Nama</th><th>Rating</th><th>Isi</th><th>Tampil</th><th>Aksi</th></tr>@foreach($testimoni as $t)<tr><td>{{$t->nama}}</td><td>{{$t->rating}}/5</td><td>{{$t->isi}}</td><td>{{$t->tampil?'Ya':'Tidak'}}</td><td><form method="POST" action="/admin/testimoni/{{$t->id}}">@csrf @method('PUT')<input type="hidden" name="tampil" value="0"><input type="checkbox" name="tampil" value="1" @checked($t->tampil)><button>Simpan</button></form></td></tr>@endforeach</table></section>
@endsection
