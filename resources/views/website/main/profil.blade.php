@extends('website.main.layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Pengguna</title>
    <style>
        .profile-container {
            margin: 50px;
            background-color: #eaf0f8;
            border-radius: 0px;
            padding: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 0px;

        }
        .profile-image {
            text-align: center;
        }
        .profile-image img {
            border-radius: 50%;
            width: 250px;
            height: 250px;
            object-fit: cover;
            border: 3px solid #6c757d;
        }
        .profile-title{
            margin-left: 50px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="profile-title">
        <h3>#My Profile</h3>
    <hr>
    <p>set your name, bio, and other public facing information. Learn more.</p>
    </div>
    <div class="profile-container row">
       
        
        <div class="profile-image col-md-4">
            {{-- @if($pg->profile_photo) --}}
                <img src="" alt="Foto Profil Pengguna">
            {{-- @else --}}
                {{-- <img src="" alt="Default Foto Profil"> --}}
            {{-- @endif --}}
        </div>

        <div class="profile-details col-md-8">
            <form action="{{ route('profile_edit') }}" method="POST">
                @csrf
                @foreach ($pengguna as $pg)
                <div class="form-group">
                    <label for="username"><strong>Nama:</strong></label>
                    <input type="text" id="username" name="username" class="form-control" value="{{ $user->username }}" required>
                </div>
        
                <div class="form-group">
                    <label for="email"><strong>Email:</strong></label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>
        
                <div class="form-group">
                    <label for="role"><strong>Role:</strong></label>
                    <input type="text" id="role" name="role" class="form-control" value="{{ $user->role }}" readonly>
                </div>
        
                <div class="form-group">
                    <label for="jenis_kelamin"><strong>Jenis Kelamin:</strong></label>
                    <input type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control" value="{{ $pg->jenis_kelamin }}" required>
                </div>
        
                <div class="form-group">
                    <label for="alamat"><strong>Alamat:</strong></label>
                    <input type="text" id="alamat" name="alamat" class="form-control" value="{{ $pg->alamat }}" required>
                </div>
                @endforeach
        
                <button type="submit" class="btn btn-success mt-3">Update Profil</button>
            </form>
        
            <!-- Link kembali ke dashboard jurnalis -->
            <a href="{{ url('/dashboardjurnalis') }}" class="btn btn-primary mt-3">Kembali ke Dashboard</a>
        </div>
        @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    </div>
{{-- </div> --}}

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

@endsection
