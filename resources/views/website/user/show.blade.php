<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Optional: link ke stylesheet -->
</head>
<body>
    <div class="container">
        <h1>{{ $artikel->judul }}</h1>
        <img src="{{ asset('storage/' . $artikel->image) }}" alt="{{ $artikel->judul }}" style="width:476px; height:auto;">
        
        <div>
            <p><strong>video:</strong> {{ $artikel->video }}</p>
            <p><strong>konten:</strong> {{ $artikel->video }}</p>
            <p><strong>status:</strong> {{ $artikel->status }}</p>
            <p><strong>kategori:</strong> {{ $artikel->nama }}</p>
            <p><strong>Dibuat pada:</strong> {{ $artikel->created_at->format('d-m-Y H:i') }}</p>
            <p><strong>Diupdate pada:</strong> {{ $artikel->updated_at->format('d-m-Y H:i') }}</p>
            <p><strong>penulis:</strong> {{ $artikel->penulis}}</p>
            <p><strong>editor:</strong> {{ $artikel->editor }}</p>
        </div>
        
        <div>
            <h2>Konten Artikel</h2>
            <p>{{ $artikel->konten }}</p>
        </div>
        
        @if($artikel->video)
            <div>
                <h2>Video</h2>
                <video width="600" controls>
                    <source src="{{ asset('storage/' . $artikel->video) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        @endif
        
        <a href="{{ url()->previous() }}">Kembali</a> <!-- Tombol kembali -->
    </div>
</body>
</html>
