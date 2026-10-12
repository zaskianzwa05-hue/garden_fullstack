@extends('user.layout')
@section('title','Testimoni — Garden Dreams')
@section('content')
<section class="section compact"><div class="page-heading"><span class="eyebrow">CUSTOMER STORIES</span><h1>Testimoni Pelanggan</h1></div><div class="testimonial-grid">@foreach($testimoni as $t)<div class="quote"><div class="stars">{{str_repeat('★',$t->rating)}}</div><p>“{{$t->isi}}”</p><strong>{{$t->nama}}</strong></div>@endforeach</div></section>
@endsection
