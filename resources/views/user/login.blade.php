@extends('user.layout')
@section('title','Masuk — Garden Dreams')
@section('content')
<section class="auth-page"><div class="auth-card"><span class="eyebrow">WELCOME BACK</span><h1>Masuk ke Garden Dreams</h1><p>Kelola pesanan dan wishlist kamu dalam satu tempat.</p><form action="/login" method="POST">@csrf<label>Email<input type="email" name="email" value="{{old('email')}}" required></label><label>Password<input type="password" name="password" required></label><button class="btn full">Masuk</button></form><div class="or">atau</div><button class="social-btn" type="button">G · Lanjut dengan Google</button><p class="auth-bottom">Belum punya akun? <a href="/register">Daftar sekarang</a></p></div></section>
@endsection
