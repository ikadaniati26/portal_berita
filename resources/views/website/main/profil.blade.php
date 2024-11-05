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
            margin: 100px;
            background-color:white;
            border-radius: 0px;
            padding: 50px;
            margin-top: 0px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.50);
        }
        .profile-image {
            text-align: center;
        }
        .profile-image img {
            border-radius: 0%;
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
    <p>tetapkan nama Anda, biodata, dan informasi publik lainnya. Pelajari lebih lanjut.</p>
    </div>
    <div class="profile-container row">
       
        <div class="profile-image col-md-4">
            <img src="{{ $pengguna->img }}" alt="Foto Profil Pengguna" class="img-fluid">
        </div>
    

        <div class="profile-details col-md-8">
            <form action="{{ route('profile_show') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username"><strong>Nama:</strong></label>
                    <input type="text" id="username" name="username" class="form-control" value="{{ $user->username }}" required>
                </div>
        
                {{-- <div class="form-group">
                    <label for="email"><strong>Email:</strong></label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>
        
                <div class="form-group">
                    <label for="role"><strong>Role:</strong></label>
                    <input type="text" id="role" name="role" class="form-control" value="{{ $user->role }}" readonly>
                </div> --}}
        
                <div class="form-group">
                    <label for="jenis_kelamin"><strong>Jenis Kelamin:</strong></label>
                    <input type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control" value="{{ $pengguna->jenis_kelamin }}" required>
                </div>
        
                <div class="form-group">
                    <label for="alamat"><strong>Alamat:</strong></label>
                    <input type="text" id="alamat" name="alamat" class="form-control" value="{{ $pengguna->status_perkawinan }}" required>
                </div>

                <div class="form-group">
                    <label for="alamat"><strong>Jabatan:</strong></label>
                    <input type="text" id="alamat" name="alamat" class="form-control" value="{{ $pengguna->jabatan }}" required>
                </div>

                <div class="form-group">
                    <label for="alamat"><strong>Alamat:</strong></label>
                    <input type="text" id="alamat" name="alamat" class="form-control" value="{{ $pengguna->alamat }}" required>
                </div>
                <button type="submit" class="btn btn-success mt-3">Update Profil</button>
            </form>
        
            <!-- Link kembali ke dashboard jurnalis -->
            <a href="{{ url('/dashboardjurnalis') }}" class="btn btn-primary mt-3">Kembali ke Dashboard</a>
        </div>
        
    </div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

@endsection
