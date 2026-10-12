@extends('user.layout')
@section('title','Daftar — Garden Dreams')
@section('content')
<section class="auth-page"><div class="auth-card"><span class="eyebrow">CREATE ACCOUNT</span><h1>Buat akun Garden Dreams</h1><p>Daftar untuk checkout lebih cepat dan menyimpan wishlist.</p><form action="/register" method="POST">@csrf<label>Nama Lengkap<input name="nama" value="{{old('nama')}}" required></label><label>Email<input type="email" name="email" value="{{old('email')}}" required></label><label>No. HP<input name="no_hp" value="{{old('no_hp')}}" required></label><label>Password<input type="password" name="password" required></label><label>Konfirmasi Password<input type="password" name="password_confirmation" required></label><button class="btn full">Daftar</button></form><p class="auth-bottom">Sudah punya akun? <a href="/login">Masuk</a></p></div></section>
@endsection
