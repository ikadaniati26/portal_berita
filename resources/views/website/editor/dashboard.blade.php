@extends('website.main.layout')

@section('content')

<div class="container">
  <div class="page-inner">
    <!-- Notifikasi Jumlah Artikel Baru -->
    <div class="alert alert-info" role="alert">
      Anda memiliki <strong>{{ $artikelBaru }}</strong> artikel yang perlu segera dicek. <a
        href="{{ route('artikel.dashboard')}}" style="color: red">Lihat Sekarang</a>
    </div>
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      {{-- <div>
        <h3 class="fw-bold mb-3">Dashboard Editor</h3>
        <h6 class="op-7 mb-2">Free Bootstrap 5 Admin Dashboard</h6>
      </div>
      <div class="ms-md-auto py-2 py-md-0">
        <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
        <a href="#" class="btn btn-primary btn-round">Add Customer</a>
      </div> --}}
    </div>


    <div class="row">
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center icon-primary bubble-shadow-small">
                  <i class="fas fa-users"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Artikel Terbit</p>
                  <h4 class="card-title">{{ $jmlTerbit }}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center icon-info bubble-shadow-small">
                  <i class="fas fa-user-check"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Jml Berita Utama</p>
                  <h4 class="card-title">{{ $jmlBu }}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center icon-success bubble-shadow-small">
                  <i class="fas fa-luggage-cart"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Jml Berita Trending</p>
                  <h4 class="card-title">{{ $jmlBt }}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<hr>
    <div class="container mt-5">
      @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
      @endif
      <!-- Page Header -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Kelola Kategori</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Tambah
          Kategori</button>
      </div>

      <!-- Categories Table -->
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
          <thead class="table-light">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Kategori</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <!-- Sample Row -->
            @php
            $no = 1;
            @endphp
            @foreach ($kategori as $item)
            <tr>
              <td>{{ $no++}}</td>
              <td>{{$item->nama}}</td>
              <td><span class="badge bg-success">{{$item->status}}</span></td>
              <td>
                  <form method="POST" action="{{ route('hapus_kategori',['id'=>$item->idkategori])}}">
                      @csrf
                      @method('DELETE')
                      {{-- &nbsp; --}}
                      <button type="submit" class="btn btn-danger btn-sm"
                          title="Hapus Pegawai"
                          onclick="return confirm('Anda Yakin Data akan diHapus?')">
                          Hapus
                      </button>
                  </form>
              </td>
              </td>
            </tr>
            @endforeach
            <!-- Repeat rows as needed for each category -->
          </tbody>
        </table>
      </div>
    </div>


    <!-- Modal for Adding New Category -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="{{ route('tambahKategori') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- CSRF token for Laravel -->

            <div class="modal-header">
              <h5 class="modal-title" id="addCategoryModalLabel">Tambah Kategori Baru</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <!-- Category Name -->
              <div class="mb-3">
                <label for="categoryName" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="categoryName" name="nama" required>
              </div>

              <!-- Status -->
              <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                  <option value="true">Aktif</option>
                  <option value="false">Tidak Aktif</option>
                </select>
                
              </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan Kategori</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection