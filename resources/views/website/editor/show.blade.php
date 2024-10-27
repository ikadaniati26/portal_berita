<!-- resources/views/website/user/show.blade.php -->
@foreach($artikel as $artikel)
    <h1>{{ $artikel->judul }}</h1>
    <p>{{ $artikel->konten }}</p>
    <p>Ditulis oleh: {{ $artikel->penulis }}</p>
    <p>Tanggal: {{ $artikel->created_at->format('d M Y') }}</p>
    <hr> <!-- Garis pemisah antar artikel -->
@endforeach
