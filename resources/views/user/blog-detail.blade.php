@extends('user.layout')
@section('title',$artikel->judul.' — Garden Dreams')
@section('content')
<section class="section static-page"><a class="back" href="/blog">← Kembali ke blog</a><span class="eyebrow">GARDEN JOURNAL</span><h1>{{$artikel->judul}}</h1><small>{{$artikel->created_at->format('d M Y')}}</small><div class="article-content"><p>{{$artikel->ringkasan}}</p><p>{{$artikel->isi}}</p></div></section>
@endsection
