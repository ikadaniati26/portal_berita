@extends('website.main.layout')

@section('content')
<div class="container mt-5 bg-light p-4 rounded shadow">
    <div class="news-detail">
        <!-- Judul Berita -->
        <h1 class="news-title text-center text-primary" style="font-family: 'Georgia', serif;">{{ $artikel->judul }}</h1>

        <!-- Gambar Utama Berita -->
        @if($artikel->gambar)
            <div class="news-image text-center my-3">
                <img src="{{ $artikel->gambar }}" alt="Gambar Berita" class="img-fluid rounded">
            </div>
        @endif

        <!-- Video Berita -->
        @if($artikel->video)
            <div class="news-video mt-4">
                <video controls width="100%" class="rounded">
                    <source src="{{ $artikel->video }}" type="video/mp4">
                    Browser Anda tidak mendukung video.
                </video>
            </div>
        @endif

        <!-- Konten Berita -->
        <div class="news-content mt-4">
            <p style="font-family: 'Arial', sans-serif; font-size: 1.1em;">{{ $artikel->konten }}</p>
        </div>

        <!-- Detail Tambahan Berita -->
        <div class="news-meta mt-4">
            <ul class="list-group">
                <li class="list-group-item"><strong>Status:</strong> {{ $artikel->status }}</li>
                <li class="list-group-item"><strong>Ditulis oleh:</strong> {{ $artikel->penulis }}</li>
                <li class="list-group-item"><strong>Diedit oleh:</strong> {{ $artikel->editor ?? 'Belum diedit' }}</li>
                <li class="list-group-item"><strong>Kategori:</strong> {{ $artikel->nama }}</li>
                <li class="list-group-item"><strong>Tanggal Dibuat:</strong> {{ $artikel->created_at->format('d M Y H:i') }}</li>
                <li class="list-group-item"><strong>Terakhir Diperbarui:</strong> {{ $artikel->updated_at->format('d M Y H:i') }}</li>
            </ul>
        </div>
    </div>
</div>

<!-- Include Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Optional: Include Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Georgia:wght@700&family=Arial:wght@400&display=swap" rel="stylesheet">

@endsection
