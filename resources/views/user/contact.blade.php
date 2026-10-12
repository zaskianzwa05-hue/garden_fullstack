@extends('user.layout')
@section('title','Kontak Kami — Garden Dreams')
@section('content')
<section class="section compact"><div class="page-heading"><span class="eyebrow">CONTACT</span><h1>Kontak Kami</h1><p>Kami siap membantu pertanyaan tentang produk dan pesanan.</p></div><div class="contact-grid"><div class="info-block"><h2>Garden Dreams</h2><p>📍 Jakarta & sekitarnya<br>☎ 0812-3456-7890<br>✉ hello@gardendreams.test<br>📷 @gardendreams</p><p>Jam layanan: Senin–Sabtu, 09.00–18.00.</p></div><div class="form-card"><form action="/kontak" method="POST">@csrf<label>Nama<input name="nama" required></label><label>Email<input type="email" name="email" required></label><label>Pesan<textarea name="pesan" required></textarea></label><button class="btn">Kirim Pesan</button></form></div></div></section>
@endsection
