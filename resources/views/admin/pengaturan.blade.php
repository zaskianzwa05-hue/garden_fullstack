@extends('admin.layout')
@section('heading','Pengaturan Website')
@section('content')
<section class="panel"><h2>Identitas Website & Informasi Kontak</h2><form method="POST">@csrf<label>Nama Toko<input name="nama_toko" value="{{$pengaturan['nama_toko']->nilai??'Garden Dreams'}}" required></label><label>Logo / URL Gambar<input name="logo" value="{{$pengaturan['logo']->nilai??''}}"></label><label>Nomor Telepon<input name="telepon" value="{{$pengaturan['telepon']->nilai??''}}"></label><label>Email<input type="email" name="email" value="{{$pengaturan['email']->nilai??''}}"></label><label>Alamat<textarea name="alamat">{{$pengaturan['alamat']->nilai??''}}</textarea></label><button class="primary">Simpan Pengaturan</button></form></section>
@endsection
