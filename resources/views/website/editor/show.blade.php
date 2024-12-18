@extends('website.main.layout')

@section('content')
<div class="container">
    <div class="news-detail">
        <!-- Judul Berita -->
        <h1 class="news-title">{{ $artikel->judul }}</h1>

        <!-- Gambar Utama Berita -->
        @if($artikel->gambar)
            <div class="news-image">
                <img src="" alt="Gambar Berita" class="img-fluid">
            </div>
        @endif

        {{-- <!-- Video Berita -->
        @if($artikel->video)
            <div class="news-video mt-4">
                <video controls width="100%">
                    <source src="" type="video/mp4">
                    Browser Anda tidak mendukung video.
                </video>
            </div>
        @endif --}}

        <!-- Konten Berita -->
        <div class="news-content mt-4">
            <p>{{ $artikel->konten }}</p>
        </div>

        <!-- Detail Tambahan Berita -->
        <div class="news-meta mt-4">
            <ul class="list-group">
                <li class="list-group-item"><strong>Status:</strong> {{ $artikel->status }}</li>
                <li class="list-group-item"><strong>Ditulis oleh:</strong> {{ $artikel->penulis}}</li>
                <li class="list-group-item"><strong>Diedit oleh:</strong> {{ $artikel->editor ?? 'Belum diedit' }}</li>
                <li class="list-group-item"><strong>Kategori:</strong> {{ $artikel->kategori }}</li>
                <li class="list-group-item"><strong>Tanggal Dibuat:</strong> {{ $artikel->created_at->format('d M Y H:i') }}</li>
                <li class="list-group-item"><strong>Terakhir Diperbarui:</strong> {{ $artikel->updated_at->format('d M Y H:i') }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
