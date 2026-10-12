@extends('admin.layout')
@section('heading','Manajemen Pelanggan')
@section('content')
<section class="panel"><form class="search"><input name="q" value="{{request('q')}}" placeholder="Cari nama/email"><button>Cari</button></form><table><tr><th>Nama</th><th>Email</th><th>No. HP</th><th>Pesanan</th><th>Aksi</th></tr>@foreach($pelanggan as $u)<tr><td>{{$u->nama}}</td><td>{{$u->email}}</td><td>{{$u->no_hp}}</td><td>{{$u->transaksi_count}}</td><td><form method="POST" action="/admin/pelanggan/{{$u->id}}">@csrf @method('DELETE')<button class="danger">Hapus</button></form></td></tr>@endforeach</table>{{$pelanggan->links()}}</section>
@endsection
