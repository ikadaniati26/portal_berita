@extends('website.main.layout')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <h2 class="mb-4">#Form Edit Artikel</h2> <!-- Judul Form -->
           
            <form action="{{ route('update_artikel', ['id' => $artikel->idartikel]) }}" method="POST">
             @csrf
             @method('PATCH')
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Artikel:</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{isset($artikel->judul)?$artikel->judul : ''}}">
                @error('judul')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

             <div class="mb-3">
                <label for="image" class="form-label">URL Gambar:</label>
                <input type="text" class="form-control" id="image" name="image" placeholder="https://example.com/image.jpg" value="{{isset($artikel->image)?$artikel->image : ''}}">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="video" class="form-label">URL Video (Opsional):</label>
                <input type="text" class="form-control" id="video" name="video" placeholder="https://example.com/video.mp4" value="{{isset($artikel->video)?$artikel->video : ''}}">
                @error('video')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="konten" class="form-label">Konten Artikel:</label>
                <textarea class="form-control" id="konten" name="konten" rows="5">{{isset($artikel->konten)?$artikel->konten : ''}}</textarea>
                @error('konten')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <input type="hidden" class="form-control" id="status" name="status" value="{{isset($artikel->status)?$artikel->status : ''}}">
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="kategori_idkategori" class="form-label">Kategori:</label>
                <select class="form-control" id="kategori_idkategori" name="kategori_idkategori">
                    <option value="">Pilih Kategori</option>
                    @foreach($kategori as $k)
                        <option value="{{ $k->kategori_idkategori }}" {{ old('kategori_idkategori') == $k->idkategori ? 'selected' : '' }}>
                            {{ $k->nama }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_idkategori')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis:</label>
                <input type="text" class="form-control" id="penulis" name="penulis" value="{{isset($artikel->penulis)?$artikel->penulis : ''}}">
                @error('penulis')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="editor" class="form-label">Editor</label>
                <input type="text" class="form-control" id="editor" name="editor" value="{{isset($artikel->editor)?$artikel->editor : ''}}">
                @error('editor')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>  
            
            <button type="submit" class="btn btn-primary" name="action" value="submit" >Submit</button>
            <button type="submit" class="btn btn-primary" name="action" value="draft">Simpan Sebagai Draft</button>
        </form>
        </div>
    </div>
</div>
@endsection
