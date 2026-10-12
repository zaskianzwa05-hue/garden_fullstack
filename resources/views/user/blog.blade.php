@extends('user.layout')
@section('title','Blog — Garden Dreams')
@section('content')
<section class="section compact"><div class="page-heading"><span class="eyebrow">GARDEN JOURNAL</span><h1>Blog & Inspirasi</h1><p>Tips merawat bunga dan ide hadiah untuk orang tersayang.</p></div><div class="article-grid">@foreach($blog as $b)<article class="article-card"><div class="article-image">🌸</div><div><small>{{ $b->created_at->format('d M Y') }}</small><h2>{{$b->judul}}</h2><p>{{$b->ringkasan}}</p><a class="text-link" href="/blog/{{$b->slug}}">Baca artikel →</a></div></article>@endforeach</div></section>
@endsection
