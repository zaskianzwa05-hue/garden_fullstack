@extends('admin.layout')
@section('heading','Pengguna & Hak Akses')
@section('content')
<section class="panel"><table><tr><th>Nama</th><th>Email</th><th>Role</th><th>No. HP</th><th>Aksi</th></tr>@foreach($pengguna as $u)<tr><td>{{$u->nama}}</td><td>{{$u->email}}</td><td>{{$u->role}}</td><td>{{$u->no_hp}}</td><td><details><summary>Edit</summary><form method="POST" action="/admin/pengguna/{{$u->id}}">@csrf @method('PUT')<input name="nama" value="{{$u->nama}}"><input name="email" value="{{$u->email}}"><select name="role"><option value="user" @selected($u->role==='user')>user</option><option value="admin" @selected($u->role==='admin')>admin</option></select><input name="no_hp" value="{{$u->no_hp}}"><button>Simpan</button></form></details><form method="POST" action="/admin/pengguna/{{$u->id}}">@csrf @method('DELETE')<button class="danger">Hapus</button></form></td></tr>@endforeach</table>{{$pengguna->links()}}</section>
@endsection
