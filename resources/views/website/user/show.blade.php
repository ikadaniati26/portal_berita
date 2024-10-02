@extends('website.user.layout')

@section('content')

<h1>{{ $artikel->judul }}</h1>
<p>{{ $artikel->konten }}</p>

@endsection
