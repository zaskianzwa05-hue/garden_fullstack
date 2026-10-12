@extends('user.layout')
@section('title','Promo — Garden Dreams')
@section('content')
<section class="section compact"><div class="page-heading"><span class="eyebrow">PROMO & DISKON</span><h1>Penawaran Spesial</h1></div><div class="promo-grid">@forelse($promo as $p)<div class="promo-card"><span class="eyebrow">{{$p->kode}}</span><h2>{{$p->nama}}</h2><p>{{$p->deskripsi}}</p><strong>{{ $p->tipe==='persen' ? $p->nilai.'% OFF' : 'Rp '.number_format($p->nilai,0,',','.') }}</strong><small>Min. belanja Rp {{number_format($p->min_belanja,0,',','.')}} · sampai {{$p->berakhir->format('d M Y')}}</small></div>@empty<p>Belum ada promo aktif.</p>@endforelse</div></section>
@endsection
