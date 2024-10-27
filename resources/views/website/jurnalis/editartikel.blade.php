@extends('website.main.layout')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <h2 class="mb-4">#Form Input Artikel</h2> <!-- Judul Form -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('store') }}" method="POST">
             @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Artikel:</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{isset($query->judul)?$query->judul : ''}}">
                @error('judul')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- <div class="mb-3">
                <label for="image" class="form-label">URL Gambar:</label>
                <input type="text" class="form-control" id="image" name="image" placeholder="https://example.com/image.jpg" value="{{ old('image') }}">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- <div class="mb-3">
                <label for="video" class="form-label">URL Video (Opsional):</label>
                <input type="text" class="form-control" id="video" name="video" placeholder="https://example.com/video.mp4" value="{{ old('video') }}">
                @error('video')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="konten" class="form-label">Konten Artikel:</label>
                <textarea class="form-control" id="konten" name="konten" rows="5">{{ old('konten') }}</textarea>
                @error('konten')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <input type="hidden" class="form-control" id="status" name="status" value="cek editor">
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="kategori_idkategori" class="form-label">Kategori:</label>
                <input type="text" class="form-control" id="kategori_idkategori" name="kategori_idkategori" value="{{ old('kategori_idkategori') }}">
                @error('kategori_idkategori')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis:</label>
                <input type="text" class="form-control" id="penulis" name="penulis" value="{{ old('penulis') }}">
                @error('penulis')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="editor" class="form-label">Editor</label>
                <input type="text" class="form-control" id="editor" name="editor" value="{{ old('editor') }}">
                @error('editor')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div> --}} 
            <button type="submit" class="btn btn-primary">Simpan Artikel</button>
        </form>
        </div>
    </div>
</div>
@endsection
