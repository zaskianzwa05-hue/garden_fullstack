@extends('user.layout')
@section('title','Pengembalian — Garden Dreams')
@section('content')
<section class="section compact"><div class="form-card narrow"><span class="eyebrow">RETURN</span><h1>Ajukan Pengembalian</h1><p>Pesanan #GD-{{str_pad($pesanan->id,5,'0',STR_PAD_LEFT)}}</p><form method="POST">@csrf<label>Alasan pengembalian<textarea name="alasan" required minlength="10" placeholder="Jelaskan alasan pengembalian..."></textarea></label><button class="btn">Kirim Pengajuan</button></form></div></section>
@endsection
