@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lengkapi Profil Anda</h1>
    
    <!-- Menampilkan pesan error jika ada -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form untuk lengkapi profil -->
    <form action="{{ route('proses-lengkapi-profil') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $user->nama_lengkap) }}" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $user->alamat) }}" required>
        </div>

        <div class="form-group">
            <label for="telepon">Telepon:</label>
            <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon', $user->telepon) }}" required>
        </div>

        <!-- Tambahkan field lain sesuai kebutuhan, misalnya tanggal lahir, jenis kelamin, dll -->

        <button type="submit" class="btn btn-primary">Simpan Profil</button>
    </form>
</div>
@endsection
