@extends('website.main.layout')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h3 class="text-center">Form Input Artikel</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="store">
                        @csrf <!-- CSRF token untuk keamanan -->
                         <!-- Judul -->
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Artikel</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" placeholder="Masukkan Judul Artikel" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Gambar (Link) -->
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Link Gambar</label>
                            <input type="url" class="form-control" id="gambar" name="gambar" placeholder="Masukkan Link Gambar" required>
                        </div>

                        <!-- Video (Link) -->
                        <div class="mb-3">
                            <label for="video" class="form-label">Link Video</label>
                            <input type="url" class="form-control" id="video" name="video" placeholder="Masukkan Link Video" required>
                        </div>

                        <!-- Konten dengan WYSIWYG Editor -->
                        <div class="mb-3">
                            <label for="konten" class="form-label">Konten Artikel</label>
                            <textarea class="form-control" id="konten" name="konten" placeholder="Masukkan Konten Artikel" required></textarea>
                            
                        </div>

                        <!-- Penulis -->
                        <div class="mb-3">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Masukkan Nama Penulis" required>
                        </div>

                        <!-- Editor -->
                        <div class="mb-3">
                            <label for="editor" class="form-label">Editor</label>
                            <input type="text" class="form-control" id="editor" name="editor" placeholder="Masukkan Nama Editor" required>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">Submit Artikel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection